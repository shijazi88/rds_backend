<?php

namespace App\Http\Requests;

use App\Models\CommandLog;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCommandLogRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('command_log_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:command_logs,id',
        ];
    }
}
