<?php

namespace App\Http\Requests\Users\Users;

use App\Http\Requests\ApiFormRequest;

class UserSignUpRequest extends ApiFormRequest
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
