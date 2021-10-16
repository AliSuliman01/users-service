<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Global\Languages\LanguageController;

Route::group(['prefix' => 'languages'],
	function () {
		Route::get('{id}', [LanguageController::class,'show']);
		Route::get('', [LanguageController::class,'index']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('store', [LanguageController::class,'store']);
			Route::post('update', [LanguageController::class,'update']);
			Route::post('destroy', [LanguageController::class,'destroy']);
		});
	});
