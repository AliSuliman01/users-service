<?php


namespace App\Domain\Base\Categories\CategoryImages\Actions;


use App\Domain\Base\Categories\CategoryImages\DTO\CategoryImageDTO;
use App\Domain\Base\Categories\CategoryImages\Model\CategoryImage;
use Illuminate\Support\Facades\Auth;

class CategoryImageUpdateAction
{

    public static function execute(
        CategoryImage $categoryImage,
        CategoryImageDTO $categoryImageDTO
    ){
        $categoryImage->update(array_filter($categoryImageDTO->toArray(),function ($item){return $item != null;}));
        $categoryImage->save();
        return $categoryImage;
    }
}
