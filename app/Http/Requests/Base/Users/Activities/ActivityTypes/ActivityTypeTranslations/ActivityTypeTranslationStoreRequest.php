<?php


namespace App\Http\Requests\Base\Users\Activities\ActivityTypes\ActivityTypeTranslations;


use App\Http\Requests\ApiFormRequest;

class ActivityTypeTranslationStoreRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'activity_type_id' 					=> '' ,
			'translation_lang_id' 					=> '' ,
			'name' 					=> '' ,
			'description' 					=> '' ,

        ];
    }
}
