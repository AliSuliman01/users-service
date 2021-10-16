<?php


namespace App\Domain\Global\Users\Activities\ActivityTypes\ActivityTypes\Actions;


use App\Domain\Global\Users\Activities\ActivityTypes\ActivityTypes\DTO\ActivityTypeDTO;
use App\Domain\Global\Users\Activities\ActivityTypes\ActivityTypes\Model\ActivityType;

class ActivityTypeStoreAction
{
    public static function execute(
        ActivityTypeDTO $activityTypeDTO
    ){

        $activityType = new ActivityType($activityTypeDTO->toArray());
        $activityType->save();
        return $activityType;
    }
}
