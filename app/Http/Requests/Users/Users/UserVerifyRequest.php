<?php

namespace App\Http\Requests\Users\Users;


use App\Http\Requests\ApiFormRequest;

class UserVerifyRequest extends ApiFormRequest
{
    public function rules()
    {
        return [
            'verification_token' => 'required',
        ];
    }
}
