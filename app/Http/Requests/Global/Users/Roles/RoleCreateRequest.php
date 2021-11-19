<?php


namespace App\Http\Requests\Global\Users\Roles;


use App\Http\Requests\CustomFormRequest;

class RoleCreateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'name' 					=> '' ,
			
        ];
    }
}
