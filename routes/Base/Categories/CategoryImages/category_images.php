<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Base\Categories\CategoryImages\CategoryImageController;

Route::group(['prefix' => 'category_images'],
	function () {
		Route::get('{id}', [CategoryImageController::class,'show']);
		Route::get('', [CategoryImageController::class,'index']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('store', [CategoryImageController::class,'store']);
			Route::post('update', [CategoryImageController::class,'update']);
			Route::post('destroy', [CategoryImageController::class,'destroy']);
		});
	});
