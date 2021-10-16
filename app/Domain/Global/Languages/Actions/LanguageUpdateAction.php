<?php


namespace App\Domain\Global\Languages\Actions;


use App\Domain\Global\Languages\DTO\LanguageDTO;
use App\Domain\Global\Languages\Model\Language;
use Illuminate\Support\Facades\Auth;

class LanguageUpdateAction
{

    public static function execute(
        LanguageDTO $languageDTO
    ){
        $language = Language::find($languageDTO->id);
        $language->update(array_filter($languageDTO->toArray()));
        $language->save();
        return $language;
    }
}
