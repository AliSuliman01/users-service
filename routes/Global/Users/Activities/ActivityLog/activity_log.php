<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Global\Users\Activities\ActivityLog\ActivityLogController;

Route::group(['prefix' => 'activity_log'],
	function () {
		Route::get('', [ActivityLogController::class,'index']);
		Route::get('show/{id}', [ActivityLogController::class,'show']);
		Route::group([
			'middleware' => ['auth:api']
		], function () {
			Route::get('my_activities', [ActivityLogController::class,'my_activities']);
			Route::post('create', [ActivityLogController::class,'create']);
			Route::post('update', [ActivityLogController::class,'update']);
			Route::post('destroy', [ActivityLogController::class,'destroy']);
            Route::post('countOfUsers', [ActivityLogController::class,'itemsHadSeenLastTime']);
            Route::get('getMostUsersInteract/{limit}', [ActivityLogController::class,'getMostUsersInteract']);
            Route::get('getUsersInteractWithTable/{table_name}', [ActivityLogController::class,'getUsersInteractWithTable']);

        });
	});
