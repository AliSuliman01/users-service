<?php


namespace App\Http\ViewModels\Levels\LevelTranslation;

use App\Domain\Levels\LevelTranslation\Model\LevelTranslation;
use Illuminate\Contracts\Support\Arrayable;

class GetAllLevelTranslationsVM implements Arrayable
{
    public function toArray()
    {
        return LevelTranslation::query()->get();
    }
}
