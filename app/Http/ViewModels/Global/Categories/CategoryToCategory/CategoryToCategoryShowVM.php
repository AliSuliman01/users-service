<?php


namespace App\Http\ViewModels\Global\Categories\CategoryToCategory;

use App\Domain\Global\Categories\CategoryToCategory\Model\CategoryToCategory;
use Illuminate\Contracts\Support\Arrayable;


class CategoryToCategoryShowVM implements Arrayable
{

    private $categoryToCategoryId;

    public function __construct($props)
    {
        $this->categoryToCategoryId = $props['id'] ;
    }

    private function get_CategoryToCategory(){
        return CategoryToCategory::find($this->categoryToCategoryId);
    }
    public function toArray(): array
    {
        return  $this->get_CategoryToCategory()->toArray();
    }
}
