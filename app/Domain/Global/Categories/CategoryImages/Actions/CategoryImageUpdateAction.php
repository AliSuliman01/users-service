<?php


namespace App\Domain\Global\Categories\CategoryImages\Actions;


use App\Domain\Global\Categories\CategoryImages\DTO\CategoryImageDTO;
use App\Domain\Global\Categories\CategoryImages\Model\CategoryImage;
use Illuminate\Support\Facades\Auth;

class CategoryImageUpdateAction
{

    public static function execute(
        CategoryImageDTO $categoryImageDTO
    ){
        $categoryImage = CategoryImage::find($categoryImageDTO->id);
        $categoryImage->update(array_filter($categoryImageDTO->toArray()));
        $categoryImage->save();
        return $categoryImage;
    }
}
