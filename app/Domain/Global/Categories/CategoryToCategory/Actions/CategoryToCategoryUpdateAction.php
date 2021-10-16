<?php


namespace App\Domain\Global\Categories\CategoryToCategory\Actions;


use App\Domain\Global\Categories\CategoryToCategory\DTO\CategoryToCategoryDTO;
use App\Domain\Global\Categories\CategoryToCategory\Model\CategoryToCategory;
use Illuminate\Support\Facades\Auth;

class CategoryToCategoryUpdateAction
{

    public static function execute(
        CategoryToCategoryDTO $categoryToCategoryDTO
    ){
        $categoryToCategory = CategoryToCategory::find($categoryToCategoryDTO->id);
        $categoryToCategory->update(array_filter($categoryToCategoryDTO->toArray()));
        $categoryToCategory->save();
        return $categoryToCategory;
    }
}
