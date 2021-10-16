<?php


namespace App\Domain\Global\Categories\Categories\Actions;


use App\Domain\Global\Categories\Categories\DTO\CategoryDTO;
use App\Domain\Global\Categories\Categories\Model\Category;
use Illuminate\Support\Facades\Auth;

class CategoryDestroyAction
{
    public static function execute(
        CategoryDTO   $categoryDTO
    ){

        $category = Category::find($categoryDTO->id);
        $category->delete();
        return $category;
    }
}
