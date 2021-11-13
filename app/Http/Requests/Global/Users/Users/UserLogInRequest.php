<?php

namespace App\Http\Requests\Global\Users\Users;


use App\Http\Requests\CustomFormRequest;

class UserLogInRequest extends CustomFormRequest
{
    public function rules()
    {
        return [
            'email' => 'required_without:phone_number|email|exists:users,email,deleted_at,NULL',
            'phone_number' => 'required_without:email|exists:users,phone_number,deleted_at,NULL',
            'password' => 'required',
        ];
    }
}
