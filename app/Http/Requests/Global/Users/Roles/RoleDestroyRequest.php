<?php


namespace App\Http\Requests\Global\Users\Roles;


use App\Http\Requests\CustomFormRequest;

class RoleDestroyRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:roles,id,deleted_at,NULL',
        ];
    }
}
