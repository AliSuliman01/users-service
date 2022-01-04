<?php


namespace App\Http\Controllers\Base\Languages;


use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Domain\Base\Languages\Actions\LanguageStoreAction;
use App\Domain\Base\Languages\Actions\LanguageDestroyAction;
use App\Domain\Base\Languages\Actions\LanguageUpdateAction;
use App\Domain\Base\Languages\DTO\LanguageDTO;
use App\Http\Requests\Base\Languages\LanguageStoreRequest;
use App\Http\Requests\Base\Languages\LanguageUpdateRequest;
use App\Http\Requests\Base\Languages\LanguageDestroyRequest;
use App\Http\Requests\Base\Languages\LanguageShowRequest;
use App\Http\ViewModels\Base\Languages\LanguageShowVM;
use App\Http\ViewModels\Base\Languages\LanguageIndexVM;

class LanguageController extends Controller
{

    public function index(){

        return response()->json(Response::success((new LanguageIndexVM())->toArray()));
    }

    public function show(LanguageShowRequest $request){

        return response()->json(Response::success((new LanguageShowVM(['id' => $request->route('id')]))->toArray()));
    }

    public function store(LanguageStoreRequest $request){
        $data = $request->validated() ;

        $languageDTO = LanguageDTO::fromRequest($data);

        $language = LanguageStoreAction::execute($languageDTO);

        return response()->json(Response::success((new LanguageShowVM($language->toArray()))->toArray()));
    }

    public function update(LanguageUpdateRequest $request){
        $data = $request->validated() ;

        $languageDTO = LanguageDTO::fromRequest($data);

        $language = LanguageUpdateAction::execute($languageDTO);

        return response()->json(Response::success((new LanguageShowVM($language->toArray()))->toArray()));
    }

    public function destroy(LanguageDestroyRequest $request){

        return response()->json(Response::success(LanguageDestroyAction::execute(LanguageDTO::fromRequest($request->validated()))));
    }

}
