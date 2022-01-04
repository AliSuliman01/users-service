<?php


namespace App\Http\Controllers\Base\Users\Roles;


use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Domain\Base\Users\Roles\Actions\RoleCreateAction;
use App\Domain\Base\Users\Roles\Actions\RoleDestroyAction;
use App\Domain\Base\Users\Roles\Actions\RoleUpdateAction;
use App\Domain\Base\Users\Roles\DTO\RoleDTO;
use App\Http\Requests\Base\Users\Roles\RoleCreateRequest;
use App\Http\Requests\Base\Users\Roles\RoleUpdateRequest;
use App\Http\Requests\Base\Users\Roles\RoleDestroyRequest;
use App\Http\Requests\Base\Users\Roles\RoleShowRequest;
use App\Http\ViewModels\Base\Users\Roles\RoleShowVM;
use App\Http\ViewModels\Base\Users\Roles\RoleIndexVM;

class RoleController extends Controller
{

    public function index(){

        return response()->json(Response::success((new RoleIndexVM())->toArray()));
    }

    public function show(RoleShowRequest $request){

        return response()->json(Response::success((new RoleShowVM(['id' => $request->route('id')]))->toArray()));
    }

    public function create(RoleCreateRequest $request){
        $data = $request->validated() ;

        $roleDTO = RoleDTO::fromRequest($data);

        $role = RoleCreateAction::execute($roleDTO);

        return response()->json(Response::success((new RoleShowVM($role->toArray()))->toArray()));
    }

    public function update(RoleUpdateRequest $request){
        $data = $request->validated() ;

        $roleDTO = RoleDTO::fromRequest($data);

        $role = RoleUpdateAction::execute($roleDTO);

        return response()->json(Response::success((new RoleShowVM($role->toArray()))->toArray()));
    }

    public function destroy(RoleDestroyRequest $request){

        return response()->json(Response::success(RoleDestroyAction::execute(RoleDTO::fromRequest($request->validated()))));
    }

}
