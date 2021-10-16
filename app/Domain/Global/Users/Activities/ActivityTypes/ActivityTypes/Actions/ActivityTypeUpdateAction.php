<?php


namespace App\Domain\Global\Users\Activities\ActivityTypes\ActivityTypes\Actions;


use App\Domain\Global\Users\Activities\ActivityTypes\ActivityTypes\DTO\ActivityTypeDTO;
use App\Domain\Global\Users\Activities\ActivityTypes\ActivityTypes\Model\ActivityType;
use Illuminate\Support\Facades\Auth;

class ActivityTypeUpdateAction
{

    public static function execute(
        ActivityTypeDTO $activityTypeDTO
    ){
        $activityType = ActivityType::find($activityTypeDTO->id);
        $activityType->update(array_filter($activityTypeDTO->toArray()));
        $activityType->save();
        return $activityType;
    }
}
