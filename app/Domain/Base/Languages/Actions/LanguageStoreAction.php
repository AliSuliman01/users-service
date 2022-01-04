<?php


namespace App\Domain\Base\Languages\Actions;


use App\Domain\Base\Languages\DTO\LanguageDTO;
use App\Domain\Base\Languages\Model\Language;
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
