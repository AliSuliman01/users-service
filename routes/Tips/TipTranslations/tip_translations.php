<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tips\TipTranslation\TipTranslationController;

Route::apiResource('tip_translations',TipTranslationController::class);
