<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Categories\CategoryToCategory\CategoryToCategoryController;

Route::group(['prefix' => 'category_to_category'],
	function () {
		Route::get('{id}', [CategoryToCategoryController::class,'show']);
		Route::get('', [CategoryToCategoryController::class,'index']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('store', [CategoryToCategoryController::class,'store']);
			Route::post('update', [CategoryToCategoryController::class,'update']);
			Route::post('destroy', [CategoryToCategoryController::class,'destroy']);
		});
	});
