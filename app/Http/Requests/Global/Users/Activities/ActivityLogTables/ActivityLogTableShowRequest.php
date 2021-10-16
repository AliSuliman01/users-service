<?php


namespace App\Http\Requests\Global\Users\Activities\ActivityLogTables;


use App\Http\Requests\CustomFormRequest;

class ActivityLogTableShowRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id'=> 'required|exists:log_tables,id,deleted_at,NULL',
        ];
    }
}
