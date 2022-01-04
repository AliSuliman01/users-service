<?php


namespace App\Http\ViewModels\Base\Categories\CategoryToCategory;

use App\Domain\Base\Categories\CategoryToCategory\Model\CategoryToCategory;
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
