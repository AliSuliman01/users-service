<?php


namespace App\Domain\Languages\Actions;


use App\Domain\Languages\DTO\LanguageDTO;
use App\Domain\Languages\Model\Language;
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
