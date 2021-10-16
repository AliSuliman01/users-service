<?php


namespace App\Http\Controllers\Global\Users\Activities\ActivityLogTables;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Global\Users\Activities\ActivityLogTables\Actions\ActivityLogTableStoreAction;
use App\Domain\Global\Users\Activities\ActivityLogTables\Actions\ActivityLogTableDestroyAction;
use App\Domain\Global\Users\Activities\ActivityLogTables\Actions\ActivityLogTableUpdateAction;
use App\Domain\Global\Users\Activities\ActivityLogTables\DTO\ActivityLogTableDTO;
use App\Http\Requests\Global\Users\Activities\ActivityLogTables\ActivityLogTableStoreRequest;
use App\Http\Requests\Global\Users\Activities\ActivityLogTables\ActivityLogTableUpdateRequest;
use App\Http\Requests\Global\Users\Activities\ActivityLogTables\ActivityLogTableDestroyRequest;
use App\Http\Requests\Global\Users\Activities\ActivityLogTables\ActivityLogTableShowRequest;
use App\Http\ViewModels\Global\Users\Activities\ActivityLogTables\ActivityLogTableShowVM;
use App\Http\ViewModels\Global\Users\Activities\ActivityLogTables\ActivityLogTableIndexVM;

class ActivityLogTableController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new ActivityLogTableIndexVM())->toArray()));
    }

    public function show(ActivityLogTableShowRequest $request){

        return response()->json(Helpers::createSuccessResponse((new ActivityLogTableShowVM(['id' => $request->route('id')]))->toArray()));
    }

    public function store(ActivityLogTableStoreRequest $request){
        $data = $request->validated() ;

        $logTableDTO = ActivityLogTableDTO::fromRequest($data);

        $logTable = ActivityLogTableStoreAction::execute($logTableDTO);

        return response()->json(Helpers::createSuccessResponse((new ActivityLogTableShowVM($logTable->toArray()))->toArray()));
    }

    public function update(ActivityLogTableUpdateRequest $request){
        $data = $request->validated() ;

        $logTableDTO = ActivityLogTableDTO::fromRequest($data);

        $logTable = ActivityLogTableUpdateAction::execute($logTableDTO);

        return response()->json(Helpers::createSuccessResponse((new ActivityLogTableShowVM($logTable->toArray()))->toArray()));
    }

    public function destroy(ActivityLogTableDestroyRequest $request){

        return response()->json(Helpers::createSuccessResponse(ActivityLogTableDestroyAction::execute(ActivityLogTableDTO::fromRequest($request->validated()))));
    }

}
