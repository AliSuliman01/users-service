<?php

namespace App\Domain\Base\Users\Users\Actions;

use App\Domain\Base\Users\Users\Model\User;
use App\Domain\Base\Users\Users\DTO\UserDTO;
use Illuminate\Support\Facades\Hash;

class UserStoreAction
{
    public static function execute(UserDTO $userDTO){
        $user = new User($userDTO->toArray());
        $user->password = Hash::make($userDTO->password);
        $user->save();
        return $user;
    }
}
