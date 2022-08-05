<?php


namespace App\Http\Controllers\Categories\CategoryToCategory;


use App\Domain\Categories\CategoryToCategory\Model\CategoryToCategory;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Domain\Categories\CategoryToCategory\Actions\CategoryToCategoryStoreAction;
use App\Domain\Categories\CategoryToCategory\Actions\CategoryToCategoryDestroyAction;
use App\Domain\Categories\CategoryToCategory\Actions\CategoryToCategoryUpdateAction;
use App\Domain\Categories\CategoryToCategory\DTO\CategoryToCategoryDTO;
use App\Http\Requests\Categories\CategoryToCategory\CategoryToCategoryStoreRequest;
use App\Http\Requests\Categories\CategoryToCategory\CategoryToCategoryUpdateRequest;
use App\Http\ViewModels\Categories\CategoryToCategory\CategoryToCategoryShowVM;
use App\Http\ViewModels\Categories\CategoryToCategory\CategoryToCategoryIndexVM;

class CategoryToCategoryController extends Controller
{

    public function index(){

        return response()->json(Response::success((new CategoryToCategoryIndexVM())->toArray()));
    }

    public function show(CategoryToCategory $categoryToCategory){

        return response()->json(Response::success((new CategoryToCategoryShowVM($categoryToCategory))->toArray()));
    }

    public function store(CategoryToCategoryStoreRequest $request){
        $data = $request->validated() ;

        $categoryToCategoryDTO = CategoryToCategoryDTO::fromRequest($data);

        $categoryToCategory = CategoryToCategoryStoreAction::execute($categoryToCategoryDTO);

        return response()->json(Response::success((new CategoryToCategoryShowVM($categoryToCategory))->toArray()));
    }

    public function update(CategoryToCategory $categoryToCategory, CategoryToCategoryUpdateRequest $request){
        $data = $request->validated() ;

        $categoryToCategoryDTO = CategoryToCategoryDTO::fromRequest($data);

        $categoryToCategory = CategoryToCategoryUpdateAction::execute($categoryToCategory, $categoryToCategoryDTO);

        return response()->json(Response::success((new CategoryToCategoryShowVM($categoryToCategory))->toArray()));
    }

    public function destroy(CategoryToCategory $categoryToCategory){

        return response()->json(Response::success(CategoryToCategoryDestroyAction::execute($categoryToCategory)));
    }

}
