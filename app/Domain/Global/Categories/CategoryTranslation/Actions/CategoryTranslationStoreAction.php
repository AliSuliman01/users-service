<?php


namespace App\Domain\Global\Categories\CategoryTranslation\Actions;


use App\Domain\Global\Categories\CategoryTranslation\DTO\CategoryTranslationDTO;
use App\Domain\Global\Categories\CategoryTranslation\Model\CategoryTranslation;
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
