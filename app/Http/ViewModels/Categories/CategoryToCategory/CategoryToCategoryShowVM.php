<?php


namespace App\Http\ViewModels\Categories\CategoryToCategory;

use App\Domain\Categories\CategoryToCategory\Model\CategoryToCategory;
use Illuminate\Contracts\Support\Arrayable;


class CategoryToCategoryShowVM implements Arrayable
{

    private $categoryToCategory;

    public function __construct(CategoryToCategory $categoryToCategory)
    {
        $this->categoryToCategory = $categoryToCategory ;
    }

    public function toArray()
    {
        return  $this->categoryToCategory;
    }
}
