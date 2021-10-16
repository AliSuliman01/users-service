<?php


namespace App\Http\Requests\Global\Users\Activities\ActivityLogTables;


use App\Http\Requests\CustomFormRequest;

class ActivityLogTableStoreRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'table_name' 					=> 'required|string' ,

        ];
    }
}
