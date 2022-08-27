<?php


namespace App\Http\ViewModels\Levels\LevelTranslation;

use App\Domain\Levels\LevelTranslation\Model\LevelTranslation;
use Illuminate\Contracts\Support\Arrayable;


class GetLevelTranslationVM implements Arrayable
{

    private $level_translation;

    public function __construct($level_translation)
    {
        $this->level_translation = $level_translation;
    }

    public function toArray()
    {
        return  $this->level_translation;
    }
}
