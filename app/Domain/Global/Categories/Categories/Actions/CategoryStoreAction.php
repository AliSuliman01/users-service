<?php


namespace App\Domain\Global\Categories\Categories\Actions;


use App\Domain\Global\Categories\Categories\DTO\CategoryDTO;
use App\Domain\Global\Categories\Categories\Model\Category;
use Illuminate\Support\Facades\Auth;

class CategoryStoreAction
{
    public static function execute(
        CategoryDTO $categoryDTO
    ){

        $category = new Category($categoryDTO->toArray());
        $category->save();
        return $category;
    }
}
