<?php

namespace App\Domain\Global\Categories\CategoryImages\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryImage extends Model
{
    use HasFactory, SoftDeletes;
}
