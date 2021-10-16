<?php


namespace App\Http\Requests\Global\Users\Activities\ActivityTypes\ActivityTypeTranslations;


use App\Http\Requests\CustomFormRequest;

class ActivityTypeTranslationStoreRequest extends CustomFormRequest
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
