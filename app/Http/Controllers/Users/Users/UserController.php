<?php

namespace App\Http\Controllers\Users\Users;

use AliSuliman\MicroFeatures\Exceptions\Exception;
use AliSuliman\MicroFeatures\Helpers\StatusCode;
use App\Domain\Users\Users\Actions\UserStoreAction;
use App\Domain\Users\Users\Model\User;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Domain\Users\Users\DTO\UserDTO;
use App\Http\Requests\Users\Users\UserLogInRequest;
use App\Http\Requests\Users\Users\UserStoreRequest;
use App\Http\Requests\Users\Users\UserSignUpRequest;
use App\Http\Requests\Users\Users\UserUpdateRequest;
use App\Http\ViewModels\Users\Users\UserIndexVM;
use App\Http\ViewModels\Users\Users\UserShowVM;
use App\Notifications\VerificationMailNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class UserController extends Controller
{
    public function index(){
        return response()->json(Response::success((new UserIndexVM())->toArray()));
    }

    public function show(User $user){
        return response()->json(Response::success((new UserShowVM($user))->toArray()));
    }

    public function sign_up(UserSignUpRequest $request){

        $userDTO = UserDTO::fromRequest($request->validated());
        $user = UserStoreAction::execute($userDTO);

        try {
            Notification::route('mail', $user->email)->notify(new VerificationMailNotification($user));
        }catch (\Throwable $e){
            throw new Exception($e->getMessage(),$e->getTrace(), StatusCode::UNPROCESSABLE_ENTITY);
        }

        $token = $user->createToken('personal access token',$user->arrayOfRoles() ?? []);
        $user->setAttribute('access_token', $token->accessToken);

        return response()->json(Response::success($user), 200);
    }

    public function log_in(UserLogInRequest $request){
        $user = (new UserShowVM(UserDTO::fromRequest($request->validated())))->toArray();

        if(!Hash::check($request->password, $user->password)){
            return response()->json(Response::error('invalid credentials'),422);
        }
        $token = $user->createToken('personal access token',['*']);
        $user->setAttribute('token', $token->accessToken);
        return response()->json(Response::success($user));
    }

    public function store(UserStoreRequest $request){

        $data = $request->validated();
        $user = User::query()->create(array_null_filter(UserDTO::fromRequest($data)->toArray()));
        return response()->json(success((new UserShowVM($user))->toArray()));
    }

    public function update(User $user, UserUpdateRequest $request){

        $data = $request->validated();
        $user->update(array_null_filter(UserDTO::fromRequest($data)->toArray()));
        return response()->json(success((new UserShowVM($user))->toArray()));

    }

    public function destroy(User $user){
        return response()->json(success($user->delete()));
    }
}
