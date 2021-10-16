<?php


namespace App\Domain\Global\Categories\Categories\Actions;


use App\Domain\Global\Categories\Categories\DTO\CategoryDTO;
use App\Domain\Global\Categories\Categories\Model\Category;
use Illuminate\Support\Facades\Auth;

class CategoryUpdateAction
{

    public static function execute(
        CategoryDTO $categoryDTO
    ){
        $category = Category::find($categoryDTO->id);
        $category->update(array_filter($categoryDTO->toArray()));
        $category->save();
        return $category;
    }
}
