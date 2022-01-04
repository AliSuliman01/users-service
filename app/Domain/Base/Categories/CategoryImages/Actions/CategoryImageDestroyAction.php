<?php


namespace App\Domain\Base\Categories\CategoryImages\Actions;


use App\Domain\Base\Categories\CategoryImages\DTO\CategoryImageDTO;
use App\Domain\Base\Categories\CategoryImages\Model\CategoryImage;
use Illuminate\Support\Facades\Auth;

class CategoryImageDestroyAction
{
    public static function execute(
        CategoryImage $categoryImage
    ){

        $categoryImage->delete();
        return $categoryImage;
    }
}
