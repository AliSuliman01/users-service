<?php


namespace App\Http\Controllers\Global\Categories\Categories;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Global\Categories\Categories\Actions\CategoryStoreAction;
use App\Domain\Global\Categories\Categories\Actions\CategoryDestroyAction;
use App\Domain\Global\Categories\Categories\Actions\CategoryUpdateAction;
use App\Domain\Global\Categories\Categories\DTO\CategoryDTO;
use App\Http\Requests\Global\Categories\Categories\CategoryStoreRequest;
use App\Http\Requests\Global\Categories\Categories\CategoryUpdateRequest;
use App\Http\Requests\Global\Categories\Categories\CategoryDestroyRequest;
use App\Http\Requests\Global\Categories\Categories\CategoryShowRequest;
use App\Http\ViewModels\Global\Categories\Categories\CategoryShowVM;
use App\Http\ViewModels\Global\Categories\Categories\CategoryIndexVM;

class CategoryController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new CategoryIndexVM())->toArray()));
    }

    public function show(CategoryShowRequest $request){

        return response()->json(Helpers::createSuccessResponse((new CategoryShowVM(['id' => $request->route('id')]))->toArray()));
    }

    public function store(CategoryStoreRequest $request){
        $data = $request->validated() ;

        $categoryDTO = CategoryDTO::fromRequest($data);

        $category = CategoryStoreAction::execute($categoryDTO);

        return response()->json(Helpers::createSuccessResponse((new CategoryShowVM($category->toArray()))->toArray()));
    }

    public function update(CategoryUpdateRequest $request){
        $data = $request->validated() ;

        $categoryDTO = CategoryDTO::fromRequest($data);

        $category = CategoryUpdateAction::execute($categoryDTO);

        return response()->json(Helpers::createSuccessResponse((new CategoryShowVM($category->toArray()))->toArray()));
    }

    public function destroy(CategoryDestroyRequest $request){

        return response()->json(Helpers::createSuccessResponse(CategoryDestroyAction::execute(CategoryDTO::fromRequest($request->validated()))));
    }

}
