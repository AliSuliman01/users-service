<?php

namespace App\Domain\Users\Roles\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SmartModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends SmartModel
{
    use HasFactory, SoftDeletes;
}
