<?php


namespace App\Http\Requests\Global\Users\Activities\ActivityTypes\ActivityTypes;


use App\Http\Requests\CustomFormRequest;

class ActivityTypeStoreRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'translations' 					=> 'array|required' ,
            'translations.*.translation_lang_id' 					=> 'required|integer|exists:translation_languages,id,deleted_at,NULL' ,
            'translations.*.name' 					=> 'required|string|unique:activity_type_translations,name,NULL,id,deleted_at,NULL' ,
            'translations.*.description' 					=> 'nullable|string' ,

        ];
    }
}
