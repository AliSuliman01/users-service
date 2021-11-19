<?php


namespace App\Http\Controllers\Global\Users\Roles;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Global\Users\Roles\Actions\RoleCreateAction;
use App\Domain\Global\Users\Roles\Actions\RoleDestroyAction;
use App\Domain\Global\Users\Roles\Actions\RoleUpdateAction;
use App\Domain\Global\Users\Roles\DTO\RoleDTO;
use App\Http\Requests\Global\Users\Roles\RoleCreateRequest;
use App\Http\Requests\Global\Users\Roles\RoleUpdateRequest;
use App\Http\Requests\Global\Users\Roles\RoleDestroyRequest;
use App\Http\Requests\Global\Users\Roles\RoleShowRequest;
use App\Http\ViewModels\Global\Users\Roles\RoleShowVM;
use App\Http\ViewModels\Global\Users\Roles\RoleIndexVM;

class RoleController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new RoleIndexVM())->toArray()));
    }

    public function show(RoleShowRequest $request){
      
        return response()->json(Helpers::createSuccessResponse((new RoleShowVM(['id' => $request->route('id')]))->toArray()));
    }

    public function create(RoleCreateRequest $request){
        $data = $request->validated() ;

        $roleDTO = RoleDTO::fromRequest($data);
        
        $role = RoleCreateAction::execute($roleDTO);

        return response()->json(Helpers::createSuccessResponse((new RoleShowVM($role->toArray()))->toArray()));
    }

    public function update(RoleUpdateRequest $request){
        $data = $request->validated() ;

        $roleDTO = RoleDTO::fromRequest($data);
        
        $role = RoleUpdateAction::execute($roleDTO);

        return response()->json(Helpers::createSuccessResponse((new RoleShowVM($role->toArray()))->toArray()));
    }

    public function destroy(RoleDestroyRequest $request){

        return response()->json(Helpers::createSuccessResponse(RoleDestroyAction::execute(RoleDTO::fromRequest($request->validated()))));
    }

}
