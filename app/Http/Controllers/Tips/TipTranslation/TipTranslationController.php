<?php


namespace App\Http\Controllers\Tips\TipTranslation;


use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Domain\Tips\TipTranslation\Model\TipTranslation;
use App\Domain\Tips\TipTranslation\Actions\StoreTipTranslationAction;
use App\Domain\Tips\TipTranslation\Actions\DestroyTipTranslationAction;
use App\Domain\Tips\TipTranslation\Actions\UpdateTipTranslationAction;
use App\Domain\Tips\TipTranslation\DTO\TipTranslationDTO;
use App\Http\Requests\Tips\TipTranslation\StoreTipTranslationRequest;
use App\Http\Requests\Tips\TipTranslation\UpdateTipTranslationRequest;
use App\Http\ViewModels\Tips\TipTranslation\GetTipTranslationVM;
use App\Http\ViewModels\Tips\TipTranslation\GetAllTipTranslationsVM;

class TipTranslationController extends Controller
{
    public function __construct(){
        $this->middleware('datatable_adapters')->only(['index']);
        $this->middleware('auth.rest')->only(['store','update','destroy']);
    }
    public function index(){

        return response()->json(Response::success((new GetAllTipTranslationsVM())->toArray()));
    }

    public function show(TipTranslation $tipTranslation){

        return response()->json(Response::success((new GetTipTranslationVM($tipTranslation))->toArray()));
    }

    public function store(StoreTipTranslationRequest $request){

        $data = $request->validated() ;

        $tipTranslationDTO = TipTranslationDTO::fromRequest($data);

        $tipTranslation = StoreTipTranslationAction::execute($tipTranslationDTO);

        return response()->json(Response::success((new GetTipTranslationVM($tipTranslation))->toArray()));
    }

    public function update(TipTranslation $tipTranslation, UpdateTipTranslationRequest $request){

        $data = $request->validated() ;

        $tipTranslationDTO = TipTranslationDTO::fromRequest($data);

        $tipTranslation = UpdateTipTranslationAction::execute($tipTranslation, $tipTranslationDTO);

        return response()->json(Response::success((new GetTipTranslationVM($tipTranslation))->toArray()));
    }

    public function destroy(TipTranslation $tipTranslation){

        return response()->json(Response::success(DestroyTipTranslationAction::execute($tipTranslation)));
    }

}
