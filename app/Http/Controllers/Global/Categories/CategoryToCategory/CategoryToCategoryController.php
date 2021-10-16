<?php


namespace App\Http\Controllers\Global\Categories\CategoryToCategory;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Global\Categories\CategoryToCategory\Actions\CategoryToCategoryStoreAction;
use App\Domain\Global\Categories\CategoryToCategory\Actions\CategoryToCategoryDestroyAction;
use App\Domain\Global\Categories\CategoryToCategory\Actions\CategoryToCategoryUpdateAction;
use App\Domain\Global\Categories\CategoryToCategory\DTO\CategoryToCategoryDTO;
use App\Http\Requests\Global\Categories\CategoryToCategory\CategoryToCategoryStoreRequest;
use App\Http\Requests\Global\Categories\CategoryToCategory\CategoryToCategoryUpdateRequest;
use App\Http\Requests\Global\Categories\CategoryToCategory\CategoryToCategoryDestroyRequest;
use App\Http\Requests\Global\Categories\CategoryToCategory\CategoryToCategoryShowRequest;
use App\Http\ViewModels\Global\Categories\CategoryToCategory\CategoryToCategoryShowVM;
use App\Http\ViewModels\Global\Categories\CategoryToCategory\CategoryToCategoryIndexVM;

class CategoryToCategoryController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new CategoryToCategoryIndexVM())->toArray()));
    }

    public function show(CategoryToCategoryShowRequest $request){

        return response()->json(Helpers::createSuccessResponse((new CategoryToCategoryShowVM(['id' => $request->route('id')]))->toArray()));
    }

    public function store(CategoryToCategoryStoreRequest $request){
        $data = $request->validated() ;

        $categoryToCategoryDTO = CategoryToCategoryDTO::fromRequest($data);

        $categoryToCategory = CategoryToCategoryStoreAction::execute($categoryToCategoryDTO);

        return response()->json(Helpers::createSuccessResponse((new CategoryToCategoryShowVM($categoryToCategory->toArray()))->toArray()));
    }

    public function update(CategoryToCategoryUpdateRequest $request){
        $data = $request->validated() ;

        $categoryToCategoryDTO = CategoryToCategoryDTO::fromRequest($data);

        $categoryToCategory = CategoryToCategoryUpdateAction::execute($categoryToCategoryDTO);

        return response()->json(Helpers::createSuccessResponse((new CategoryToCategoryShowVM($categoryToCategory->toArray()))->toArray()));
    }

    public function destroy(CategoryToCategoryDestroyRequest $request){

        return response()->json(Helpers::createSuccessResponse(CategoryToCategoryDestroyAction::execute(CategoryToCategoryDTO::fromRequest($request->validated()))));
    }

}
