<?php


namespace App\Http\Controllers\Materials\Materials;


use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Domain\Materials\Materials\Model\Material;
use App\Domain\Materials\Materials\Actions\StoreMaterialAction;
use App\Domain\Materials\Materials\Actions\DestroyMaterialAction;
use App\Domain\Materials\Materials\Actions\UpdateMaterialAction;
use App\Domain\Materials\Materials\DTO\MaterialDTO;
use App\Http\Requests\Materials\Materials\StoreMaterialRequest;
use App\Http\Requests\Materials\Materials\UpdateMaterialRequest;
use App\Http\ViewModels\Materials\Materials\GetMaterialVM;
use App\Http\ViewModels\Materials\Materials\GetAllMaterialsVM;

class MaterialController extends Controller
{
    public function __construct(){
        $this->middleware('datatable_adapters')->only(['index']);
        $this->middleware('auth.rest')->only(['store','update','destroy']);
    }
    public function index(){

        return response()->json(Response::success((new GetAllMaterialsVM())->toArray()));
    }

    public function show(Material $material){

        return response()->json(Response::success((new GetMaterialVM($material))->toArray()));
    }

    public function store(StoreMaterialRequest $request){

        $data = $request->validated() ;

        $materialDTO = MaterialDTO::fromRequest($data);

        $material = StoreMaterialAction::execute($materialDTO);

        return response()->json(Response::success((new GetMaterialVM($material))->toArray()));
    }

    public function update(Material $material, UpdateMaterialRequest $request){

        $data = $request->validated() ;

        $materialDTO = MaterialDTO::fromRequest($data);

        $material = UpdateMaterialAction::execute($material, $materialDTO);

        return response()->json(Response::success((new GetMaterialVM($material))->toArray()));
    }

    public function destroy(Material $material){

        return response()->json(Response::success(DestroyMaterialAction::execute($material)));
    }

}
