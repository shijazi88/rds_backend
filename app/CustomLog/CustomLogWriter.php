<?php

namespace App\CustomLog;

use Illuminate\Http\Request;
use Spatie\HttpLogger\LogWriter;
use Log;
class CustomLogWriter implements LogWriter
{
    public function logRequest(Request $request): void
    {
        $method = strtoupper($request->getMethod());

        $uri = $request->getPathInfo();

        // Exclude logging for the specified API route
       

        $bodyAsJson = json_encode($request->except(config('http-logger.except')));

        $message = "{$method} {$uri} - {$bodyAsJson}";
        if (strpos($uri, '/admin/') === 0 || strpos($uri, '/assets/') === 0 ||
        pathinfo($uri, PATHINFO_EXTENSION) === 'jpg' ||
        pathinfo($uri, PATHINFO_EXTENSION) === 'png') {
            
        } else{
            Log::info($message);
        }
       
    }
}