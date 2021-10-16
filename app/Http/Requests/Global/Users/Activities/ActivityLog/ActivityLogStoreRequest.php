<?php


namespace App\Http\Requests\Global\Users\Activities\ActivityLog;


use App\Http\Requests\CustomFormRequest;

class ActivityLogStoreRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'user_id' 					=> '' ,
			'activity_type_id' 					=> '' ,
			'target_id' 					=> '' ,
			'target_table_name' 					=> '' ,

        ];
    }
}
