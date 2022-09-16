<?php

namespace App\Http\ViewModels\Users\Users;

use App\Domain\Users\Users\Model\User;
use Illuminate\Contracts\Support\Arrayable;
use Yajra\DataTables\Facades\DataTables;

class UserIndexVM implements Arrayable
{
    private function data(){
        return DataTables::eloquent(User::query())->toJson();
    }
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->data();
    }
}
