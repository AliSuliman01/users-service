<?php


namespace App\Http\ViewModels\Global\Categories\CategoryTranslation;

use App\Domain\Global\Categories\CategoryTranslation\Model\CategoryTranslation;
use Illuminate\Contracts\Support\Arrayable;

class CategoryTranslationIndexVM implements Arrayable
{

    public function get_category_translation(){
    	return CategoryTranslation::all();
	}
    public function toArray(): array
    {
        return $this->get_category_translation()->toArray();
    }
}
