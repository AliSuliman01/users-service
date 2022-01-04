<?php


namespace App\Domain\Base\Categories\Categories\Actions;


use App\Domain\Base\Categories\Categories\DTO\CategoryDTO;
use App\Domain\Base\Categories\Categories\Model\Category;
use Illuminate\Support\Facades\Auth;

class CategoryDestroyAction
{
    public static function execute(
        Category $category
    ){
        $category->delete();
        return $category;
    }
}
