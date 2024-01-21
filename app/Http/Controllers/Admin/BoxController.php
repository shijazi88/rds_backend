<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBoxRequest;
use App\Http\Requests\StoreBoxRequest;
use App\Http\Requests\UpdateBoxRequest;
use App\Models\Box;
use App\Models\CommandLog;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use PhpMqtt\Client\Facades\MQTT;
use Illuminate\Support\Facades\Session;

class BoxController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('box_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Box::query()->select(sprintf('%s.*', (new Box)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'box_show';
                $editGate      = 'box_edit';
                $deleteGate    = 'box_delete';
                $crudRoutePart = 'boxes';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? Box::STATUS_SELECT[$row->status] : '';
            });
            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : '';
            });
            $table->editColumn('lat', function ($row) {
                return $row->lat ? $row->lat : '';
            });
            $table->editColumn('lng', function ($row) {
                return $row->lng ? $row->lng : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.boxes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('box_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // 

        return view('admin.boxes.create');
    }

    public function store(StoreBoxRequest $request)
    {
        $box = Box::create($request->all());

        return redirect()->route('admin.boxes.index');
    }

    public function edit(Box $box)
    {
        abort_if(Gate::denies('box_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.boxes.edit', compact('box'));
    }

    public function update(UpdateBoxRequest $request, Box $box)
    {
        $box->update($request->all());

        return redirect()->route('admin.boxes.index');
    }

    public function show(Box $box)
    {
        abort_if(Gate::denies('box_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commands = [
            [
                'slug' => 'unlock',
                'label' => 'Unlock',
                'example' => 'RDS000001U',
                'explanation' => 'This command unlocks the box.',
            ],
            [
                'slug' => 'lock',
                'label' => 'Lock',
                'example' => 'RDS000001L',
                'explanation' => 'This command locks the box.',
            ],
            [
                'slug' => 'mode-select',
                'label' => 'Mode Select (W)',
                'example' => 'RDS000001W',
                'explanation' => 'This command selects a mode (W/G/B).',
            ],
            [
                'slug' => 'keypad-mode',
                'label' => 'Keypad Mode (K)',
                'example' => 'RDS000001K0',
                'explanation' => 'This command sets the keypad mode (1/0).',
            ],
            [
                'slug' => 'reboot',
                'label' => 'Reboot (R)',
                'example' => 'RDS000001R',
                'explanation' => 'This command reboots the box.',
            ],
            [
                'slug' => 'box-unlock',
                'label' => 'Box Unlock (U)',
                'example' => 'RDS000001U',
                'explanation' => 'This command unlocks the box.',
            ],
            [
                'slug' => 'box-lock-status',
                'label' => 'Box Lock Status (T)',
                'example' => 'RDS000001T',
                'explanation' => 'This command retrieves the box lock status.',
            ],
            [
                'slug' => 'image-capture',
                'label' => 'Image Capture (C)',
                'example' => 'RDS000001C',
                'explanation' => 'This command captures an image.',
            ],
            [
                'slug' => 'images-retrieve',
                'label' => 'Images Retrieve (I)',
                'example' => 'RDS000001I',
                'explanation' => 'This command retrieves images.',
            ],
            [
                'slug' => 'pass-codes-update',
                'label' => 'Pass Codes Update (S)',
                'example' => 'RDS000001S123456,643211,345612,125634,145623,345126,129456,128856,125556,124456',
                'explanation' => 'This command updates pass codes (10 pass codes separated by comma).',
            ],
            [
                'slug' => 'pass-code-unlock',
                'label' => 'Pass Code Unlock (P)',
                'example' => 'RDS000001P643211',
                'explanation' => 'This command unlocks with a pass code (6 characters).',
            ],
            // Add more commands here with labels, examples, and explanations as needed
        ];
    

        return view('admin.boxes.show', compact('box','commands'));
    }

    public function destroy(Box $box)
    {
        abort_if(Gate::denies('box_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $box->delete();

        return back();
    }

    public function massDestroy(MassDestroyBoxRequest $request)
    {
        $boxes = Box::find(request('ids'));

        foreach ($boxes as $box) {
            $box->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
    
    private function sendCommandAndDisplayMessage($topic, $command, $successMessage, $errorMessage)
    {
        try {
            // Perform the command operation with the provided topic and command
            MQTT::publish($topic, $command);

           
            // Add a success flash message
            Session::flash('success', $successMessage . ' ',$topic);
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            Session::flash('error', $errorMessage . ': ' . $e->getMessage());
        }
    }


    public function sendCommand(Box $box, $slug, Request $request)
    {
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
            'pass-codes-update' => 'RDS000001S123456,643211,345612,125634,145623,345126,129456,128856,125556,124456',
            // 'pass-code-unlock' => 'RDS000001P643211',
            'pass-code-unlock' => 'RDS000001P'.$request->pass_code,

            // Add more commands here
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


            // Pass the MQTT topic as a parameter
            $this->sendCommandAndDisplayMessage('RDS/'.$box->serial_number.'/cmd', $commands[$slug], ucfirst($slug) . ' command sent successfully.', 'Failed to send ' . $slug . ' command');
        }

        return redirect()->route('admin.boxes.show', $box);
    }



}
