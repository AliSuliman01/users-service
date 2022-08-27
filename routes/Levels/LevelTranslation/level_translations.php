<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Levels\LevelTranslation\LevelTranslationController;

Route::apiResource('level_translations',LevelTranslationController::class);
