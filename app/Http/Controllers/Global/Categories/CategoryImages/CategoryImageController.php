<?php


namespace App\Http\Controllers\Global\Categories\CategoryImages;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Global\Categories\CategoryImages\Actions\CategoryImageStoreAction;
use App\Domain\Global\Categories\CategoryImages\Actions\CategoryImageDestroyAction;
use App\Domain\Global\Categories\CategoryImages\Actions\CategoryImageUpdateAction;
use App\Domain\Global\Categories\CategoryImages\DTO\CategoryImageDTO;
use App\Http\Requests\Global\Categories\CategoryImages\CategoryImageStoreRequest;
use App\Http\Requests\Global\Categories\CategoryImages\CategoryImageUpdateRequest;
use App\Http\Requests\Global\Categories\CategoryImages\CategoryImageDestroyRequest;
use App\Http\Requests\Global\Categories\CategoryImages\CategoryImageShowRequest;
use App\Http\ViewModels\Global\Categories\CategoryImages\CategoryImageShowVM;
use App\Http\ViewModels\Global\Categories\CategoryImages\CategoryImageIndexVM;

class CategoryImageController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new CategoryImageIndexVM())->toArray()));
    }

    public function show(CategoryImageShowRequest $request){

        return response()->json(Helpers::createSuccessResponse((new CategoryImageShowVM(['id' => $request->route('id')]))->toArray()));
    }

    public function store(CategoryImageStoreRequest $request){
        $data = $request->validated() ;

        $categoryImageDTO = CategoryImageDTO::fromRequest($data);

        $categoryImage = CategoryImageStoreAction::execute($categoryImageDTO);

        return response()->json(Helpers::createSuccessResponse((new CategoryImageShowVM($categoryImage->toArray()))->toArray()));
    }

    public function update(CategoryImageUpdateRequest $request){
        $data = $request->validated() ;

        $categoryImageDTO = CategoryImageDTO::fromRequest($data);

        $categoryImage = CategoryImageUpdateAction::execute($categoryImageDTO);

        return response()->json(Helpers::createSuccessResponse((new CategoryImageShowVM($categoryImage->toArray()))->toArray()));
    }

    public function destroy(CategoryImageDestroyRequest $request){

        return response()->json(Helpers::createSuccessResponse(CategoryImageDestroyAction::execute(CategoryImageDTO::fromRequest($request->validated()))));
    }

}
