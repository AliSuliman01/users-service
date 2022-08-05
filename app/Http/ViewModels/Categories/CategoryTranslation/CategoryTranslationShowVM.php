<?php


namespace App\Http\ViewModels\Categories\CategoryTranslation;

use App\Domain\Categories\CategoryTranslation\Model\CategoryTranslation;
use Illuminate\Contracts\Support\Arrayable;


class CategoryTranslationShowVM implements Arrayable
{

    private $categoryTranslationId;

    public function __construct($props)
    {
        $this->categoryTranslationId = $props['id'] ;
    }

    private function get_CategoryTranslation(){
        return CategoryTranslation::find($this->categoryTranslationId);
    }
    public function toArray(): array
    {
        return  $this->get_CategoryTranslation()->toArray();
    }
}
