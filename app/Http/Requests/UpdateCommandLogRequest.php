<?php

namespace App\Http\Requests;

use App\Models\CommandLog;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCommandLogRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('command_log_edit');
    }

    public function rules()
    {
        return [
            'box_id' => [
                'required',
                'integer',
            ],
            'command' => [
                'string',
                'required',
            ],
        ];
    }
}
