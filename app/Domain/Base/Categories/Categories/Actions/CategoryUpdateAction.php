<?php


namespace App\Domain\Base\Categories\Categories\Actions;


use App\Domain\Base\Categories\Categories\DTO\CategoryDTO;
use App\Domain\Base\Categories\Categories\Model\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryUpdateAction
{

    public static function execute(
        Category $category,
        CategoryDTO $categoryDTO
    ){

        $category->update(array_filter($categoryDTO->toArray()));
        $category->save();
        return $category;
    }
}
