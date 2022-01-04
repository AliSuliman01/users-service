<?php


namespace App\Domain\Base\Categories\CategoryTranslation\Actions;


use App\Domain\Base\Categories\CategoryTranslation\DTO\CategoryTranslationDTO;
use App\Domain\Base\Categories\CategoryTranslation\Model\CategoryTranslation;
use Illuminate\Support\Facades\Auth;

class CategoryTranslationStoreAction
{
    public static function execute(
        CategoryTranslationDTO $categoryTranslationDTO
    ){

        $categoryTranslation = new CategoryTranslation($categoryTranslationDTO->toArray());
        $categoryTranslation->save();
        return $categoryTranslation;
    }
}
