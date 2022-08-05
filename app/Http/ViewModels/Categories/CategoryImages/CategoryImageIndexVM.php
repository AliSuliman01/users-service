<?php


namespace App\Http\ViewModels\Categories\CategoryImages;

use App\Domain\Categories\CategoryImages\Model\CategoryImage;
use Illuminate\Contracts\Support\Arrayable;

class CategoryImageIndexVM implements Arrayable
{

    public function get_category_images(){
    	return CategoryImage::all();
	}
    public function toArray(): array
    {
        return $this->get_category_images()->toArray();
    }
}
