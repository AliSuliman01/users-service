<?php

use App\Http\Controllers\Global\Users\Users\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'users'], function(){
   Route::post('login', [UserController::class,'log_in']);
   Route::post('sign_up', [UserController::class,'sign_up']);
   Route::get('', [UserController::class,'index']);
});
