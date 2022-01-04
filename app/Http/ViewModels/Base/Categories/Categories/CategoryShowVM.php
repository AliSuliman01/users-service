<?php


namespace App\Http\ViewModels\Base\Categories\Categories;

use App\Domain\Base\Categories\Categories\Model\Category;
use Illuminate\Contracts\Support\Arrayable;


class CategoryShowVM implements Arrayable
{

    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category ;
    }

    public function toArray()
    {
        return  $this->category;
    }
}
