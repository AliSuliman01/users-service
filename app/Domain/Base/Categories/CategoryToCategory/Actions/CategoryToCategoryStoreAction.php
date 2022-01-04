<?php


namespace App\Domain\Base\Categories\CategoryToCategory\Actions;


use App\Domain\Base\Categories\CategoryToCategory\DTO\CategoryToCategoryDTO;
use App\Domain\Base\Categories\CategoryToCategory\Model\CategoryToCategory;
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
