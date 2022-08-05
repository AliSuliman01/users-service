<?php


namespace App\Http\ViewModels\Categories\CategoryToCategory;

use App\Domain\Categories\CategoryToCategory\Model\CategoryToCategory;
use Illuminate\Contracts\Support\Arrayable;

class CategoryToCategoryIndexVM implements Arrayable
{

    public function get_category_to_category(){
    	return CategoryToCategory::all();
	}
    public function toArray(): array
    {
        return $this->get_category_to_category()->toArray();
    }
}
