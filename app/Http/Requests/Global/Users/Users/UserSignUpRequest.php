<?php

namespace App\Http\Requests\Global\Users\Users;

use App\Http\Requests\CustomFormRequest;

class UserSignUpRequest extends CustomFormRequest
{

    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,null,id,deleted_at,NULL',
            'password' => 'required|string|min:8',
        ];
    }
}
