<?php


namespace App\Http\Controllers\Base\Categories\CategoryToCategory;


use App\Domain\Base\Categories\CategoryToCategory\Model\CategoryToCategory;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Domain\Base\Categories\CategoryToCategory\Actions\CategoryToCategoryStoreAction;
use App\Domain\Base\Categories\CategoryToCategory\Actions\CategoryToCategoryDestroyAction;
use App\Domain\Base\Categories\CategoryToCategory\Actions\CategoryToCategoryUpdateAction;
use App\Domain\Base\Categories\CategoryToCategory\DTO\CategoryToCategoryDTO;
use App\Http\Requests\Base\Categories\CategoryToCategory\CategoryToCategoryStoreRequest;
use App\Http\Requests\Base\Categories\CategoryToCategory\CategoryToCategoryUpdateRequest;
use App\Http\ViewModels\Base\Categories\CategoryToCategory\CategoryToCategoryShowVM;
use App\Http\ViewModels\Base\Categories\CategoryToCategory\CategoryToCategoryIndexVM;

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
