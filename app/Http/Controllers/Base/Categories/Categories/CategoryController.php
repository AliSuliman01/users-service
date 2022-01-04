<?php


namespace App\Http\Controllers\Base\Categories\Categories;


use App\Domain\Base\Categories\Categories\Model\Category;
use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Domain\Base\Categories\Categories\Actions\CategoryStoreAction;
use App\Domain\Base\Categories\Categories\Actions\CategoryDestroyAction;
use App\Domain\Base\Categories\Categories\Actions\CategoryUpdateAction;
use App\Domain\Base\Categories\Categories\DTO\CategoryDTO;
use App\Http\Requests\Base\Categories\Categories\CategoryStoreRequest;
use App\Http\Requests\Base\Categories\Categories\CategoryUpdateRequest;
use App\Http\Requests\Base\Categories\Categories\CategoryDestroyRequest;
use App\Http\Requests\Base\Categories\Categories\CategoryShowRequest;
use App\Http\ViewModels\Base\Categories\Categories\CategoryShowVM;
use App\Http\ViewModels\Base\Categories\Categories\CategoryIndexVM;

class CategoryController extends Controller
{

    public function index(){

        return response()->json(Response::success((new CategoryIndexVM())->toArray()));
    }

    public function show(Category $category){

        return response()->json(Response::success((new CategoryShowVM($category))->toArray()));
    }

    public function store(CategoryStoreRequest $request){
        $data = $request->validated() ;

        $categoryDTO = CategoryDTO::fromRequest($data);

        $category = CategoryStoreAction::execute($categoryDTO);

        return response()->json(Response::success((new CategoryShowVM($category))->toArray()));
    }

    public function update(Category $category, CategoryUpdateRequest $request){

        $categoryDTO = CategoryDTO::fromRequest($request->validated());

        $category = CategoryUpdateAction::execute($category, $categoryDTO);

        return response()->json(Response::success((new CategoryShowVM($category))->toArray()));
    }

    public function destroy(Category $category){

        return response()->json(Response::success(CategoryDestroyAction::execute($category)));
    }

}
