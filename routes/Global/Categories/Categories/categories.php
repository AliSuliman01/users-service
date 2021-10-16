<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Global\Categories\Categories\CategoryController;

Route::group(['prefix' => 'categories'],
	function () {
		Route::get('{id}', [CategoryController::class,'show']);
		Route::get('', [CategoryController::class,'index']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('store', [CategoryController::class,'store']);
			Route::post('update', [CategoryController::class,'update']);
			Route::post('destroy', [CategoryController::class,'destroy']);
		});
	});
