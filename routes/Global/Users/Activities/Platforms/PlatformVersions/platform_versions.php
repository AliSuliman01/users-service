<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Global\Users\Activities\Platforms\PlatformVersions\PlatformVersionController;

Route::group(['prefix' => 'platform_versions'],
	function () {
		Route::get('', [PlatformVersionController::class,'index']);
		Route::get('show/{id}', [PlatformVersionController::class,'show']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', [PlatformVersionController::class,'create']);
			Route::post('update', [PlatformVersionController::class,'update']);
			Route::post('destroy', [PlatformVersionController::class,'destroy']);
		});
	});
