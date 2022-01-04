<?php


namespace App\Http\ViewModels\Base\Categories\CategoryTranslation;

use App\Domain\Base\Categories\CategoryTranslation\Model\CategoryTranslation;
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
