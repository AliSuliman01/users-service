<?php


namespace App\Http\Requests\Base\Users\Roles;


use App\Http\Requests\ApiFormRequest;

class RoleCreateRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'name' 					=> '' ,

        ];
    }
}
