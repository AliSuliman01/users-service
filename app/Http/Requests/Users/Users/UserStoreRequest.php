<?php

namespace App\Http\Requests\Users\Users;

use App\Http\Requests\ApiFormRequest;

class UserStoreRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,NULL,id,deleted_at,NULL',
            'phone_number' => 'nullable|string',
            'password' => 'required|string|min:8',
            'profile_picture' => 'nullable|string',
        ];
    }
}
