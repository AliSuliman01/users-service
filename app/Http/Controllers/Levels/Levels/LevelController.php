<?php


namespace App\Http\Controllers\Levels\Levels;


use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Domain\Levels\Levels\Model\Level;
use App\Domain\Levels\Levels\Actions\StoreLevelAction;
use App\Domain\Levels\Levels\Actions\DestroyLevelAction;
use App\Domain\Levels\Levels\Actions\UpdateLevelAction;
use App\Domain\Levels\Levels\DTO\LevelDTO;
use App\Http\Requests\Levels\Levels\StoreLevelRequest;
use App\Http\Requests\Levels\Levels\UpdateLevelRequest;
use App\Http\ViewModels\Levels\Levels\GetLevelVM;
use App\Http\ViewModels\Levels\Levels\GetAllLevelsVM;

class LevelController extends Controller
{
    public function __construct()
    {
        $this->middleware('datatable_adapters')->only(['index']);
        $this->middleware('auth:api')->only(['store', 'update', 'destroy']);
    }

    public function index()
    {

        return response()->json(Response::success((new GetAllLevelsVM())->toArray()));
    }

    public function show(Level $level)
    {

        return response()->json(Response::success((new GetLevelVM($level))->toArray()));
    }

    public function store(StoreLevelRequest $request)
    {

        $data = $request->validated();

        $levelDTO = LevelDTO::fromRequest($data);

        $level = StoreLevelAction::execute($levelDTO);

        $level->updateRelation('translations', $data['translations']);

        return response()->json(Response::success((new GetLevelVM($level))->toArray()));
    }

    public function update(Level $level, UpdateLevelRequest $request)
    {

        $data = $request->validated();

        $levelDTO = LevelDTO::fromRequest($data);

        $level = UpdateLevelAction::execute($level, $levelDTO);

        if (isset($data['translations']))
            $level->updateRelation('translations', $data['translations']);

        return response()->json(Response::success((new GetLevelVM($level))->toArray()));
    }

    public function destroy(Level $level)
    {

        return response()->json(Response::success(DestroyLevelAction::execute($level)));
    }

}
