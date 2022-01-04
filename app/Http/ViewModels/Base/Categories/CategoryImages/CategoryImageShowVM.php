<?php


namespace App\Http\ViewModels\Base\Categories\CategoryImages;

use App\Domain\Base\Categories\CategoryImages\Model\CategoryImage;
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
