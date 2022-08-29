<?php


namespace App\Http\Controllers\Materials\Materials;


use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Domain\Materials\Materials\Model\Material;
use App\Domain\Materials\Materials\Actions\StoreMaterialAction;
use App\Domain\Materials\Materials\Actions\DestroyMaterialAction;
use App\Domain\Materials\Materials\Actions\UpdateMaterialAction;
use App\Domain\Materials\Materials\DTO\MaterialDTO;
use App\Http\Requests\Materials\Materials\SearchMaterialRequest;
use App\Http\Requests\Materials\Materials\StoreMaterialRequest;
use App\Http\Requests\Materials\Materials\UpdateMaterialRequest;
use App\Http\ViewModels\Materials\Materials\GetMaterialVM;
use App\Http\ViewModels\Materials\Materials\GetAllMaterialsVM;
use App\Http\ViewModels\Materials\Materials\MyMaterialVM;
use App\Http\ViewModels\Materials\Materials\SearchMaterialVM;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{
    public function search(SearchMaterialRequest $request)
    {
        return response()->json(Response::success((new SearchMaterialVM($request->json('search_string')))->toArray()));
    }
    public function my_materials()
    {
        return response()->json(Response::success((new MyMaterialVM())->toArray()));
    }
}
