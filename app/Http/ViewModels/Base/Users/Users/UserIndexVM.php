<?php

namespace App\Http\ViewModels\Base\Users\Users;

use App\Domain\Base\Users\Users\Model\User;
use Illuminate\Contracts\Support\Arrayable;

class UserIndexVM implements Arrayable
{
    private function data(){
        return User::paginate();
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}
