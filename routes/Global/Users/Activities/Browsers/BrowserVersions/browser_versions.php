<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Global\Users\Activities\Browsers\BrowserVersions\BrowserVersionController;

Route::group(['prefix' => 'browser_versions'],
	function () {
		Route::get('', [BrowserVersionController::class,'index']);
		Route::get('show/{id}', [BrowserVersionController::class,'show']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', [BrowserVersionController::class,'create']);
			Route::post('update', [BrowserVersionController::class,'update']);
			Route::post('destroy', [BrowserVersionController::class,'destroy']);
		});
	});
