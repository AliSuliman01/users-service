<?php

namespace App\Domain\Global\Users\Activities\Platforms\Platforms\Model;

use App\Models\OurModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Platform extends OurModel
{
    use HasFactory,SoftDeletes;

        protected $guarded = [
            'id',
            'created_at',
            'updated_at',
            'deleted_at',
        ];

        protected $hidden = [
            'created_at',
            'updated_at',
            'deleted_at',
            'created_by_user_id',
            'updated_by_user_id',
            'deleted_by_user_id',
        ];
}
