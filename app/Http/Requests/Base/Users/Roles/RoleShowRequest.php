<?php


namespace App\Http\Requests\Base\Users\Roles;


use App\Http\Requests\ApiFormRequest;

class RoleShowRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'id'=> 'required|exists:roles,id,deleted_at,NULL',
        ];
    }
}
