<?php


namespace App\Http\ViewModels\Global\Users\Roles;

use App\Domain\Global\Users\Roles\Model\Role;
use Illuminate\Contracts\Support\Arrayable;

class RoleIndexVM implements Arrayable
{

    public function get_roles(){
    	return Role::all();
	}
    public function toArray(): array
    {
        return $this->get_roles()->toArray();
    }
}
