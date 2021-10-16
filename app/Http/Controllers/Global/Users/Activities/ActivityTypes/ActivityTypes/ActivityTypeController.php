<?php


namespace App\Http\Controllers\Global\Users\Activities\ActivityTypes\ActivityTypes;


use App\Domain\Global\Users\Activities\ActivityTypes\ActivityTypeTranslations\Actions\ActivityTypeTranslationStoreAction;
use App\Domain\Global\Users\Activities\ActivityTypes\ActivityTypeTranslations\DTO\ActivityTypeTranslationDTO;
use App\Exceptions\RequestException;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Domain\Global\Users\Activities\ActivityTypes\ActivityTypes\Actions\ActivityTypeStoreAction;
use App\Domain\Global\Users\Activities\ActivityTypes\ActivityTypes\Actions\ActivityTypeDestroyAction;
use App\Domain\Global\Users\Activities\ActivityTypes\ActivityTypes\Actions\ActivityTypeUpdateAction;
use App\Domain\Global\Users\Activities\ActivityTypes\ActivityTypes\DTO\ActivityTypeDTO;
use App\Http\Requests\Global\Users\Activities\ActivityTypes\ActivityTypes\ActivityTypeStoreRequest;
use App\Http\Requests\Global\Users\Activities\ActivityTypes\ActivityTypes\ActivityTypeUpdateRequest;
use App\Http\Requests\Global\Users\Activities\ActivityTypes\ActivityTypes\ActivityTypeDestroyRequest;
use App\Http\Requests\Global\Users\Activities\ActivityTypes\ActivityTypes\ActivityTypeShowRequest;
use App\Http\ViewModels\Global\Users\Activities\ActivityTypes\ActivityTypes\ActivityTypeShowVM;
use App\Http\ViewModels\Global\Users\Activities\ActivityTypes\ActivityTypes\ActivityTypeIndexVM;
use Illuminate\Support\Facades\DB;

class ActivityTypeController extends Controller
{

    public function index(){

        return response()->json(Helpers::createSuccessResponse((new ActivityTypeIndexVM())->toArray()));
    }

    public function show(ActivityTypeShowRequest $request){

        return response()->json(Helpers::createSuccessResponse((new ActivityTypeShowVM(['id' => $request->route('id')]))->toArray()));
    }

    public function store(ActivityTypeStoreRequest $request){
        try {

        DB::beginTransaction();
        $data = $request->validated() ;

        $activityTypeDTO = ActivityTypeDTO::fromRequest($data);

        $activityType = ActivityTypeStoreAction::execute($activityTypeDTO);

        foreach ($data['translations'] as $translation){
            $translation['activity_type_id'] = $activityType->id;
            ActivityTypeTranslationStoreAction::execute(ActivityTypeTranslationDTO::fromRequest($translation));
        }
        DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            throw new RequestException(json_encode($e->getMessage()),$e->getTrace(),$e->getCode());
        }
        return response()->json(Helpers::createSuccessResponse((new ActivityTypeShowVM($activityType->toArray()))->toArray()));
    }

    public function update(ActivityTypeUpdateRequest $request){
        $data = $request->validated() ;

        $activityTypeDTO = ActivityTypeDTO::fromRequest($data);

        $activityType = ActivityTypeUpdateAction::execute($activityTypeDTO);

        return response()->json(Helpers::createSuccessResponse((new ActivityTypeShowVM($activityType->toArray()))->toArray()));
    }

    public function destroy(ActivityTypeDestroyRequest $request){

        return response()->json(Helpers::createSuccessResponse(ActivityTypeDestroyAction::execute(ActivityTypeDTO::fromRequest($request->validated()))));
    }

}
