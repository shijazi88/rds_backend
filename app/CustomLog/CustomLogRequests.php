<?php

namespace App\CustomLog;

use Illuminate\Http\Request;
use Spatie\HttpLogger\LogProfile;

class CustomLogRequests implements LogProfile
{
    public function shouldLogRequest(Request $request): bool
    {
        return in_array(strtolower($request->method()), ['post', 'put', 'patch', 'delete','get']);
    }
}