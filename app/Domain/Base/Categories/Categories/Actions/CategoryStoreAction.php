<?php


namespace App\Domain\Base\Categories\Categories\Actions;


use App\Domain\Base\Categories\Categories\DTO\CategoryDTO;
use App\Domain\Base\Categories\Categories\Model\Category;
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
