<?php


namespace App\Http\ViewModels\Global\Categories\Categories;

use App\Domain\Global\Categories\Categories\Model\Category;
use Illuminate\Contracts\Support\Arrayable;


class CategoryShowVM implements Arrayable
{

    private $categoryId;

    public function __construct($props)
    {
        $this->categoryId = $props['id'] ;
    }

    private function get_Category(){
        return Category::find($this->categoryId);
    }
    public function toArray(): array
    {
        return  $this->get_Category()->toArray();
    }
}
