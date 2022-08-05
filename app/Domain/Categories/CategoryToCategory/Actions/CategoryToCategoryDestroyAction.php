<?php


namespace App\Domain\Categories\CategoryToCategory\Actions;


use App\Domain\Categories\CategoryToCategory\DTO\CategoryToCategoryDTO;
use App\Domain\Categories\CategoryToCategory\Model\CategoryToCategory;
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
