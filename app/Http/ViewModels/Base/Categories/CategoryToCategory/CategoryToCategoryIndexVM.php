<?php


namespace App\Http\ViewModels\Base\Categories\CategoryToCategory;

use App\Domain\Base\Categories\CategoryToCategory\Model\CategoryToCategory;
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
