<?php


namespace App\Http\ViewModels\Categories\CategoryImages;

use App\Domain\Categories\CategoryImages\Model\CategoryImage;
use Illuminate\Contracts\Support\Arrayable;


class CategoryImageShowVM implements Arrayable
{

    private $categoryImage;

    public function __construct(CategoryImage $categoryImage)
    {
        $this->categoryImage = $categoryImage ;
    }
    public function toArray()
    {
        return  $this->categoryImage;
    }
}
