<?php

namespace App\Http\Requests\Users\Users;

use App\Http\Requests\ApiFormRequest;

class UserUpdateRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,NULL,id,deleted_at,NULL',
            'phone_number' => 'nullable|string',
            'profile_picture' => 'nullable|string',
        ];
    }
}
