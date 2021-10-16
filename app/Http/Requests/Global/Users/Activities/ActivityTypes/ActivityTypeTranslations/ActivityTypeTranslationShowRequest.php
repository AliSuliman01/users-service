<?php


namespace App\Http\Requests\Global\Users\Activities\ActivityTypes\ActivityTypeTranslations;


use App\Http\Requests\CustomFormRequest;

class ActivityTypeTranslationShowRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id'=> 'required|exists:activity_type_translations,id,deleted_at,NULL',
        ];
    }
}
