<?php


namespace App\Http\ViewModels\Base\Users\Activities\ActivityTypes\ActivityTypeTranslations;

use App\Domain\Base\Users\Activities\ActivityTypes\ActivityTypeTranslations\Model\ActivityTypeTranslation;
use Illuminate\Contracts\Support\Arrayable;


class ActivityTypeTranslationShowVM implements Arrayable
{

    private $activityTypeTranslationId;

    public function __construct($props)
    {
        $this->activityTypeTranslationId = $props['id'] ;
    }

    private function get_ActivityTypeTranslation(){
        return ActivityTypeTranslation::find($this->activityTypeTranslationId);
    }
    public function toArray(): array
    {
        return [
            'ActivityTypeTranslation' => $this->get_ActivityTypeTranslation()
        ];
    }
}
