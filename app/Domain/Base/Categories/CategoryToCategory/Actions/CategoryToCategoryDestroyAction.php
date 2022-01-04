<?php


namespace App\Domain\Base\Categories\CategoryToCategory\Actions;


use App\Domain\Base\Categories\CategoryToCategory\DTO\CategoryToCategoryDTO;
use App\Domain\Base\Categories\CategoryToCategory\Model\CategoryToCategory;
use Illuminate\Support\Facades\Auth;

class CategoryToCategoryDestroyAction
{
    public static function execute(
        CategoryToCategory $categoryToCategory
    ){

        $categoryToCategory->delete();
        return $categoryToCategory;
    }
}
