<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Materials\Materials\MaterialController;

Route::apiResource('materials',MaterialController::class);
