<?php

namespace App\Http\Requests;

use App\Models\Box;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBoxRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('box_edit');
    }

    public function rules()
    {
        return [
            'status' => [
                'required',
            ],
            'price' => [
                'required',
            ],
            'lat' => [
                'numeric',
            ],
            'lng' => [
                'numeric',
            ],
            'expiry_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
