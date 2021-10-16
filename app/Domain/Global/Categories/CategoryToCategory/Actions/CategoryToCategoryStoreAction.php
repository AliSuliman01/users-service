<?php


namespace App\Domain\Global\Categories\CategoryToCategory\Actions;


use App\Domain\Global\Categories\CategoryToCategory\DTO\CategoryToCategoryDTO;
use App\Domain\Global\Categories\CategoryToCategory\Model\CategoryToCategory;
use Illuminate\Support\Facades\Auth;

class CategoryToCategoryStoreAction
{
    public static function execute(
        CategoryToCategoryDTO $categoryToCategoryDTO
    ){

        $categoryToCategory = new CategoryToCategory($categoryToCategoryDTO->toArray());
        $categoryToCategory->save();
        return $categoryToCategory;
    }
}
