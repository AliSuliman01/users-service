<?php

namespace App\Domain\Languages\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\SmartModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends SmartModel
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
}
