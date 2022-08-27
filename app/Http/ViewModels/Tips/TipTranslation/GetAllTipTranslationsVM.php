<?php


namespace App\Http\ViewModels\Tips\TipTranslation;

use App\Domain\Tips\TipTranslation\Model\TipTranslation;
use Illuminate\Contracts\Support\Arrayable;

class GetAllTipTranslationsVM implements Arrayable
{
    public function toArray()
    {
        return TipTranslation::query()->get();
    }
}
