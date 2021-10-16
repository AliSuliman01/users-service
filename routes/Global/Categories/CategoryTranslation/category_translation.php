<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Global\Categories\CategoryTranslation\CategoryTranslationController;

Route::group(['prefix' => 'category_translation'],
	function () {
		Route::get('{id}', [CategoryTranslationController::class,'show']);
		Route::get('', [CategoryTranslationController::class,'index']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('store', [CategoryTranslationController::class,'store']);
			Route::post('update', [CategoryTranslationController::class,'update']);
			Route::post('destroy', [CategoryTranslationController::class,'destroy']);
		});
	});
