<?php


namespace App\Domain\Global\Languages\Actions;


use App\Domain\Global\Languages\DTO\LanguageDTO;
use App\Domain\Global\Languages\Model\Language;
use Illuminate\Support\Facades\Auth;

class LanguageStoreAction
{
    public static function execute(
        LanguageDTO $languageDTO
    ){

        $language = new Language($languageDTO->toArray());
        $language->save();
        return $language;
    }
}
