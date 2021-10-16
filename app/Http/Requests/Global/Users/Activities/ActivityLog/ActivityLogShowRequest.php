<?php


namespace App\Http\Requests\Global\Users\Activities\ActivityLog;


use App\Http\Requests\CustomFormRequest;

class ActivityLogShowRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id'=> 'required|exists:user_activities,id,deleted_at,NULL',
        ];
    }
}
