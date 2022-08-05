<?php


namespace App\Domain\Categories\CategoryToCategory\Actions;


use App\Domain\Categories\CategoryToCategory\DTO\CategoryToCategoryDTO;
use App\Domain\Categories\CategoryToCategory\Model\CategoryToCategory;
use Illuminate\Support\Facades\Auth;

class CategoryToCategoryUpdateAction
{

    public static function execute(
        CategoryToCategory $categoryToCategory,
        CategoryToCategoryDTO $categoryToCategoryDTO
    ){
        $categoryToCategory->update(array_filter($categoryToCategoryDTO->toArray(),function ($item){return $item != null;}));
        $categoryToCategory->save();
        return $categoryToCategory;
    }
}
