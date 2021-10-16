<?php


namespace App\Http\Controllers\Global\Languages;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Global\Languages\Actions\LanguageStoreAction;
use App\Domain\Global\Languages\Actions\LanguageDestroyAction;
use App\Domain\Global\Languages\Actions\LanguageUpdateAction;
use App\Domain\Global\Languages\DTO\LanguageDTO;
use App\Http\Requests\Global\Languages\LanguageStoreRequest;
use App\Http\Requests\Global\Languages\LanguageUpdateRequest;
use App\Http\Requests\Global\Languages\LanguageDestroyRequest;
use App\Http\Requests\Global\Languages\LanguageShowRequest;
use App\Http\ViewModels\Global\Languages\LanguageShowVM;
use App\Http\ViewModels\Global\Languages\LanguageIndexVM;

class LanguageController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new LanguageIndexVM())->toArray()));
    }

    public function show(LanguageShowRequest $request){

        return response()->json(Helpers::createSuccessResponse((new LanguageShowVM(['id' => $request->route('id')]))->toArray()));
    }

    public function store(LanguageStoreRequest $request){
        $data = $request->validated() ;

        $languageDTO = LanguageDTO::fromRequest($data);

        $language = LanguageStoreAction::execute($languageDTO);

        return response()->json(Helpers::createSuccessResponse((new LanguageShowVM($language->toArray()))->toArray()));
    }

    public function update(LanguageUpdateRequest $request){
        $data = $request->validated() ;

        $languageDTO = LanguageDTO::fromRequest($data);

        $language = LanguageUpdateAction::execute($languageDTO);

        return response()->json(Helpers::createSuccessResponse((new LanguageShowVM($language->toArray()))->toArray()));
    }

    public function destroy(LanguageDestroyRequest $request){

        return response()->json(Helpers::createSuccessResponse(LanguageDestroyAction::execute(LanguageDTO::fromRequest($request->validated()))));
    }

}
