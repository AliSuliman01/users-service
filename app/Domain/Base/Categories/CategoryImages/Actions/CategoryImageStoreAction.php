<?php


namespace App\Domain\Base\Categories\CategoryImages\Actions;


use App\Domain\Base\Categories\CategoryImages\DTO\CategoryImageDTO;
use App\Domain\Base\Categories\CategoryImages\Model\CategoryImage;
use Illuminate\Support\Facades\Auth;

class CategoryImageStoreAction
{
    public static function execute(
        CategoryImageDTO $categoryImageDTO
    ){

        $categoryImage = new CategoryImage($categoryImageDTO->toArray());
        $categoryImage->save();
        return $categoryImage;
    }
}
