<?php


namespace App\Http\ViewModels\Base\Categories\Categories;

use App\Domain\Base\Categories\Categories\Model\Category;
use Illuminate\Contracts\Support\Arrayable;

class CategoryIndexVM implements Arrayable
{

    public function get_categories(){
    	return Category::all();
	}
    public function toArray(): array
    {
        return $this->get_categories()->toArray();
    }
}
