<?php

namespace App\Domain\Global\Categories\CategoryToCategory\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryToCategory extends Model
{
    use HasFactory, SoftDeletes;
}
