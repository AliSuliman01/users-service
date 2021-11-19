<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Global\Users\Roles\RoleController;

Route::group(['prefix' => 'roles'],
	function () {
		Route::get('', [RoleController::class,'index']);
		Route::get('show/{id}', [RoleController::class,'show']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', [RoleController::class,'create']);
			Route::post('update', [RoleController::class,'update']);
			Route::post('destroy', [RoleController::class,'destroy']);
		});
	});
