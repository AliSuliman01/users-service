<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('routes', function(){
    foreach (Route::getRoutes() as $route){
        if (str_contains($route->uri, '/users'))
            echo $route->getActionMethod() . ' : ' . $route->uri . "<br />";
    }
});

Route::get('testLog',function (){
    return response()->json("hi");
})->middleware(\AliSuliman\MicroFeatures\Http\Middleware\Log::class);
