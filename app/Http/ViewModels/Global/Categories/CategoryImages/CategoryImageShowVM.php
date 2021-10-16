<?php


namespace App\Http\ViewModels\Global\Categories\CategoryImages;

use App\Domain\Global\Categories\CategoryImages\Model\CategoryImage;
use Illuminate\Contracts\Support\Arrayable;


class CategoryImageShowVM implements Arrayable
{

    private $categoryImageId;

    public function __construct($props)
    {
        $this->categoryImageId = $props['id'] ;
    }

    private function get_CategoryImage(){
        return CategoryImage::find($this->categoryImageId);
    }
    public function toArray(): array
    {
        return  $this->get_CategoryImage()->toArray();
    }
}
