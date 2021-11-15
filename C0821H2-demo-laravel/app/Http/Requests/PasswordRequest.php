<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'oldpwd' => 'required',
            'newpwd' => 'required',
            'cfm' => 'required|same:newpwd',
        ];
    }

    public function messages()
    {
        return [
            'oldpwd.required' => 'Khong duoc de trong',
            'newpwd.required' => 'Khong duoc de trong',
            'cfm.required' => 'Khong duoc de trong',
            'cfm.same' => 'Mat khau xac nhan khong dung'
        ];
    }
}
