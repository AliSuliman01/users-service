<?php

namespace App\Domain\Users\Activities\DeviceType\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SmartModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeviceType extends SmartModel
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name',
        'parent_id',
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
    ];

    protected $hidden = [

        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
