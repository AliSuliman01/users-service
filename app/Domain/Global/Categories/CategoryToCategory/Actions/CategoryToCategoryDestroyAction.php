<?php


namespace App\Domain\Global\Categories\CategoryToCategory\Actions;


use App\Domain\Global\Categories\CategoryToCategory\DTO\CategoryToCategoryDTO;
use App\Domain\Global\Categories\CategoryToCategory\Model\CategoryToCategory;
use Illuminate\Support\Facades\Auth;

class CategoryToCategoryDestroyAction
{
    public static function execute(
        CategoryToCategoryDTO   $categoryToCategoryDTO
    ){

        $categoryToCategory = CategoryToCategory::find($categoryToCategoryDTO->id);
        $categoryToCategory->delete();
        return $categoryToCategory;
    }
}
