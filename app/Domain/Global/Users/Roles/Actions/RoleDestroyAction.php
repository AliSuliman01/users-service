<?php


namespace App\Domain\Global\Users\Roles\Actions;


use App\Domain\Global\Users\Roles\DTO\RoleDTO;
use App\Domain\Global\Users\Roles\Model\Role;
use Illuminate\Support\Facades\Auth;

class RoleDestroyAction
{
    public static function execute(
        RoleDTO   $roleDTO
    ){

        $role = Role::find($roleDTO->id);
        $role->delete();
        return $role;
    }
}
