<?php


namespace App\Domain\Global\Languages\Actions;


use App\Domain\Global\Languages\DTO\LanguageDTO;
use App\Domain\Global\Languages\Model\Language;
use Illuminate\Support\Facades\Auth;

class LanguageDestroyAction
{
    public static function execute(
        LanguageDTO   $languageDTO
    ){

        $language = Language::find($languageDTO->id);
        $language->delete();
        return $language;
    }
}
