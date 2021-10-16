<?php


namespace App\Domain\Global\Categories\CategoryImages\Actions;


use App\Domain\Global\Categories\CategoryImages\DTO\CategoryImageDTO;
use App\Domain\Global\Categories\CategoryImages\Model\CategoryImage;
use Illuminate\Support\Facades\Auth;

class CategoryImageDestroyAction
{
    public static function execute(
        CategoryImageDTO   $categoryImageDTO
    ){

        $categoryImage = CategoryImage::find($categoryImageDTO->id);
        $categoryImage->delete();
        return $categoryImage;
    }
}
