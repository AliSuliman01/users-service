<?php


namespace App\Http\Requests\Base\Users\Roles;


use App\Http\Requests\ApiFormRequest;

class RoleDestroyRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:roles,id,deleted_at,NULL',
        ];
    }
}
