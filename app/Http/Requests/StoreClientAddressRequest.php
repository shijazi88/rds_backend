<?php

namespace App\Http\Requests;

use App\Models\ClientAddress;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClientAddressRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_address_create');
    }

    public function rules()
    {
        return [
            'client_id' => [
                'required',
                'integer',
            ],
            'lat' => [
                'numeric',
                'required',
            ],
            'lng' => [
                'numeric',
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
