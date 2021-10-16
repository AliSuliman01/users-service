<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Global\Users\Activities\ActivityLogTables\ActivityLogTableController;

Route::group(['prefix' => 'log_tables'],
	function () {
		Route::get('', [ActivityLogTableController::class,'index']);
		Route::get('show/{id}', [ActivityLogTableController::class,'show']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::post('create', [ActivityLogTableController::class,'create']);
			Route::post('update', [ActivityLogTableController::class,'update']);
			Route::post('destroy', [ActivityLogTableController::class,'destroy']);
		});
	});
