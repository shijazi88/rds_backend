<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\Box;
use App\Models\CommandLog;
use PhpMqtt\Client\Facades\MQTT;

class MqttController extends Controller
{
    public function receiveCommands(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'box_id' => 'required|exists:boxes,id', // Validate that the box_id exists in the boxes table
            'command' => 'required|in:unlock,lock,mode-select,keypad-mode,reboot,box-unlock,box-lock-status,image-capture,images-retrieve,pass-codes-update,pass-code-unlock',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid data'], 400);
        }

        // Retrieve the Box based on the box_id
        $box = Box::find($request->box_id);

        if (!$box) {
            return response()->json(['error' => 'Box not found'], 404);
        }

        // Extract the MQTT command from the request
        $slug = $request->command;
        $topic = 'RDS/'.$box->serial_number.'/cmd';
        // Perform actions based on the received command
        try {
            $commands = [
                'unlock' => 'RDS000001U',
                'lock' => 'RDS000001L',
                'mode-select' => 'RDS000001W',
                'keypad-mode' => 'RDS000001K0',
                'reboot' => 'RDS000001R',
                'box-unlock' => 'RDS000001U',
                'box-lock-status' => 'RDS000001T',
                'image-capture' => 'RDS000001C',
                'images-retrieve' => 'RDS000001I',
                'pass-codes-update' => 'RDS000001S',
                // 'pass-code-unlock' => 'RDS000001P643211',
                'pass-code-unlock' => 'RDS000001P'.$request->pass_code,
            ];
    
            if (array_key_exists($slug, $commands)) {
    
                if ($slug === 'pass-codes-update') {
                    // Generate random pass codes using the generateRandomPassCodes method
                    $randomPassCodes = $this->generateRandomPassCodes(10, 6);
                    
                    // Update the 'pass-codes-update' command with the generated pass codes
                    $commands['pass-codes-update'] = 'RDS000001S' . implode(',', $randomPassCodes);
                    
                    // Update the 'box' table with the generated pass codes
                    $box->pass_codes = implode(',', $randomPassCodes);
                    $box->save();
                }
    
                
                CommandLog::create([
                    'box_id' => $box->id,
                    'command' => $commands[$slug],
                ]);
                $command = $commands[$slug];
    
                MQTT::publish($topic, $command);

            }

            // Respond with a success message
            return response()->json(['message' => 'MQTT command sent and logged successfully']);
        } catch (\Exception $e) {
            return $e;
            // Handle any exceptions or errors
            Log::error('Error sending MQTT command: ' . $e->getMessage());

            return response()->json(['error' => 'Failed to send MQTT command'], 500);
        }
    }



}
