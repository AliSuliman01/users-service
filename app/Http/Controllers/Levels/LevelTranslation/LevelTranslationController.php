<?php


namespace App\Http\Controllers\Levels\LevelTranslation;


use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Domain\Levels\LevelTranslation\Model\LevelTranslation;
use App\Domain\Levels\LevelTranslation\Actions\StoreLevelTranslationAction;
use App\Domain\Levels\LevelTranslation\Actions\DestroyLevelTranslationAction;
use App\Domain\Levels\LevelTranslation\Actions\UpdateLevelTranslationAction;
use App\Domain\Levels\LevelTranslation\DTO\LevelTranslationDTO;
use App\Http\Requests\Levels\LevelTranslation\StoreLevelTranslationRequest;
use App\Http\Requests\Levels\LevelTranslation\UpdateLevelTranslationRequest;
use App\Http\ViewModels\Levels\LevelTranslation\GetLevelTranslationVM;
use App\Http\ViewModels\Levels\LevelTranslation\GetAllLevelTranslationsVM;

class LevelTranslationController extends Controller
{
    public function __construct(){
        $this->middleware('datatable_adapters')->only(['index']);
        $this->middleware('auth.rest')->only(['store','update','destroy']);
    }
    public function index(){

        return response()->json(Response::success((new GetAllLevelTranslationsVM())->toArray()));
    }

    public function show(LevelTranslation $levelTranslation){

        return response()->json(Response::success((new GetLevelTranslationVM($levelTranslation))->toArray()));
    }

    public function store(StoreLevelTranslationRequest $request){

        $data = $request->validated() ;

        $levelTranslationDTO = LevelTranslationDTO::fromRequest($data);

        $levelTranslation = StoreLevelTranslationAction::execute($levelTranslationDTO);

        return response()->json(Response::success((new GetLevelTranslationVM($levelTranslation))->toArray()));
    }

    public function update(LevelTranslation $levelTranslation, UpdateLevelTranslationRequest $request){

        $data = $request->validated() ;

        $levelTranslationDTO = LevelTranslationDTO::fromRequest($data);

        $levelTranslation = UpdateLevelTranslationAction::execute($levelTranslation, $levelTranslationDTO);

        return response()->json(Response::success((new GetLevelTranslationVM($levelTranslation))->toArray()));
    }

    public function destroy(LevelTranslation $levelTranslation){

        return response()->json(Response::success(DestroyLevelTranslationAction::execute($levelTranslation)));
    }

}
