<?php


namespace App\Http\ViewModels\Tips\TipTranslation;

use App\Domain\Tips\TipTranslation\Model\TipTranslation;
use Illuminate\Contracts\Support\Arrayable;


class GetTipTranslationVM implements Arrayable
{

    private $tip_translation;

    public function __construct($tip_translation)
    {
        $this->tip_translation = $tip_translation;
    }

    public function toArray()
    {
        return  $this->tip_translation;
    }
}
