<?php


namespace App\Domain\Base\Categories\CategoryTranslation\Actions;


use App\Domain\Base\Categories\CategoryTranslation\DTO\CategoryTranslationDTO;
use App\Domain\Base\Categories\CategoryTranslation\Model\CategoryTranslation;
use Illuminate\Support\Facades\Auth;

class CategoryTranslationDestroyAction
{
    public static function execute(
        CategoryTranslationDTO   $categoryTranslationDTO
    ){

        $categoryTranslation = CategoryTranslation::find($categoryTranslationDTO->id);
        $categoryTranslation->delete();
        return $categoryTranslation;
    }
}
