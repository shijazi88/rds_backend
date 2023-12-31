<?php

namespace App\Http\Requests;

use App\Models\CompanyUser;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCompanyUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('company_user_edit');
    }

    public function rules()
    {
        return [
            'compnay_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
