<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Global\Users\ActivityTypes\ActivityTypeTranslations\ActivityTypeTranslationController;

Route::group(['prefix' => 'activity_type_translations'],
	function () {
		Route::get('', [ActivityTypeTranslationController::class,'index']);
		Route::get('show/{id}', [ActivityTypeTranslationController::class,'show']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', [ActivityTypeTranslationController::class,'create']);
			Route::post('update', [ActivityTypeTranslationController::class,'update']);
			Route::post('destroy', [ActivityTypeTranslationController::class,'destroy']);
		});
	});
