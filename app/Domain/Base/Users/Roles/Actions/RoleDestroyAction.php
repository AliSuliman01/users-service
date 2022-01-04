<?php


namespace App\Domain\Base\Users\Roles\Actions;


use App\Domain\Base\Users\Roles\DTO\RoleDTO;
use App\Domain\Base\Users\Roles\Model\Role;
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
