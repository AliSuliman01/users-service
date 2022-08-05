<?php

namespace App\Domain\Categories\Categories\Model;

use App\Domain\Categories\CategoryImages\Model\CategoryImage;
use App\Domain\Categories\CategoryTranslation\Model\CategoryTranslation;
use App\Models\SmartModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends SmartModel
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];


    public function translations()
    {
        return $this->hasMany(CategoryTranslation::class,'category_id');
    }

    public function images()
    {
        return $this->hasMany(CategoryImage::class,'category_id');
    }

    public function sub_categories()
    {
        return $this->belongsToMany(Category::class,'category_to_category','parent_id','son_id');
    }
}
