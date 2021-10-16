<?php

namespace App\Http\Controllers\Global\Users\Users;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\ViewModels\Global\Users\Users\UserIndexVM;

class UserController extends Controller
{
    public function index(){
        return response()->json(Helpers::createSuccessResponse((new UserIndexVM())->toArray()));
    }

    public function show(UserShowRequest $request){
        return response()->json(Helpers::createSuccessResponse((new UserShowVM($request->validated()))->toArray()));
    }

    public function sign_up(){

    }

    public function log_in(){

    }

    public function update(){

    }

    public function destroy(){

    }
}
