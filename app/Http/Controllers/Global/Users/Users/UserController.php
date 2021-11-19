<?php

namespace App\Http\Controllers\Global\Users\Users;

use App\Domain\Global\Users\Users\Actions\UserStoreAction;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Global\Users\Users\DTO\UserDTO;
use App\Http\Requests\Global\Users\Users\UserLogInRequest;
use App\Http\Requests\Global\Users\Users\UserSignUpRequest;
use App\Http\ViewModels\Global\Users\Users\UserIndexVM;
use App\Http\ViewModels\Global\Users\Users\UserShowVM;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return response()->json(Helpers::createSuccessResponse((new UserIndexVM())->toArray()));
    }

    public function show(UserShowRequest $request){
        return response()->json(Helpers::createSuccessResponse((new UserShowVM($request->validated()))->toArray()));
    }

    public function sign_up(UserSignUpRequest $request){

        $user = UserStoreAction::execute(UserDTO::fromRequest($request->validated()));

        // TODO: send sms or gmail verification message

        return response()->json(Helpers::createSuccessResponse($user), 200);
    }

    public function log_in(UserLogInRequest $request){
        $user = (new UserShowVM(UserDTO::fromRequest($request->validated())))->toArray();

        if(!Hash::check($request->password, $user->password)){
            return response()->json(Helpers::createErrorResponse('invalid credentials'));
        }
        $token = $user->createToken('personal access token',$user->arrayOrRoles() ?? []);
        $user->setAttribute('token', $token->accessToken);
        return response()->json(Helpers::createSuccessResponse($user));
    }

    public function update(){

    }

    public function destroy(){

    }
}
