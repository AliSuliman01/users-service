<?php


namespace App\Http\ViewModels\Global\Categories\Categories;

use App\Domain\Global\Categories\Categories\Model\Category;
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
