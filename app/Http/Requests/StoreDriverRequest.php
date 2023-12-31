<?php

namespace App\Http\Requests;

use App\Models\Driver;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDriverRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('driver_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:1',
                'max:50',
                'required',
            ],
            'password' => [
                'required',
            ],
            'status' => [
                'required',
            ],
            'mobile' => [
                'string',
                'required',
            ],
            'email' => [
                'string',
                'required',
                'unique:drivers',
            ],
            'lat' => [
                'string',
                'required',
            ],
            'lng' => [
                'string',
                'nullable',
            ],
        ];
    }
}
