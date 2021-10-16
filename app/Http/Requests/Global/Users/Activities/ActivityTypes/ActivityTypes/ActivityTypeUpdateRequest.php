<?php


namespace App\Http\Requests\Global\Users\Activities\ActivityTypes\ActivityTypes;


use App\Http\Requests\CustomFormRequest;

class ActivityTypeUpdateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:activity_types,id,deleted_at,NULL',
            'name' 					=> '' ,

        ];
    }
}
