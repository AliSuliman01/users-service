<?php

namespace App\Http\ViewModels\Base\Users\Users;

use App\Domain\Base\Users\Users\Model\User;
use App\Domain\Base\Users\Users\DTO\UserDTO;
use Illuminate\Contracts\Support\Arrayable;

class UserShowVM implements Arrayable
{
    private $user ;

    public function __construct(UserDTO $userDTO)
    {
        if($userDTO->id !== null)
            $this->user = User::find($userDTO->id);
        elseif ($userDTO->email !== null)
            $this->user = User::where('email',$userDTO->email)->first();
        else
            $this->user = User::where('phone_number',$userDTO->phone_number)->first();
    }

    /**
     * @return User
     */
    public function toArray()
    {
        return $this->user;
    }
}
