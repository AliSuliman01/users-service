<?php


namespace App\Http\Controllers\Base\Categories\CategoryTranslation;


use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Domain\Base\Categories\CategoryTranslation\Actions\CategoryTranslationStoreAction;
use App\Domain\Base\Categories\CategoryTranslation\Actions\CategoryTranslationDestroyAction;
use App\Domain\Base\Categories\CategoryTranslation\Actions\CategoryTranslationUpdateAction;
use App\Domain\Base\Categories\CategoryTranslation\DTO\CategoryTranslationDTO;
use App\Http\Requests\Base\Categories\CategoryTranslation\CategoryTranslationStoreRequest;
use App\Http\Requests\Base\Categories\CategoryTranslation\CategoryTranslationUpdateRequest;
use App\Http\Requests\Base\Categories\CategoryTranslation\CategoryTranslationDestroyRequest;
use App\Http\Requests\Base\Categories\CategoryTranslation\CategoryTranslationShowRequest;
use App\Http\ViewModels\Base\Categories\CategoryTranslation\CategoryTranslationShowVM;
use App\Http\ViewModels\Base\Categories\CategoryTranslation\CategoryTranslationIndexVM;

class CategoryTranslationController extends Controller
{

    public function index(){

        return response()->json(Response::success((new CategoryTranslationIndexVM())->toArray()));
    }

    public function show(CategoryTranslationShowRequest $request){

        return response()->json(Response::success((new CategoryTranslationShowVM(['id' => $request->route('id')]))->toArray()));
    }

    public function store(CategoryTranslationStoreRequest $request){
        $data = $request->validated() ;

        $categoryTranslationDTO = CategoryTranslationDTO::fromRequest($data);

        $categoryTranslation = CategoryTranslationStoreAction::execute($categoryTranslationDTO);

        return response()->json(Response::success((new CategoryTranslationShowVM($categoryTranslation->toArray()))->toArray()));
    }

    public function update(CategoryTranslationUpdateRequest $request){
        $data = $request->validated() ;

        $categoryTranslationDTO = CategoryTranslationDTO::fromRequest($data);

        $categoryTranslation = CategoryTranslationUpdateAction::execute($categoryTranslationDTO);

        return response()->json(Response::success((new CategoryTranslationShowVM($categoryTranslation->toArray()))->toArray()));
    }

    public function destroy(CategoryTranslationDestroyRequest $request){

        return response()->json(Response::success(CategoryTranslationDestroyAction::execute(CategoryTranslationDTO::fromRequest($request->validated()))));
    }

}
