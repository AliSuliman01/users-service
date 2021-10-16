<?php


namespace App\Http\Requests\Global\Languages;


use App\Http\Requests\CustomFormRequest;

class LanguageStoreRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'name' 		=> 'required|unique:languages,name,NULL,id,deleted_at,NULL' ,
			'abbrev' 	=> 'required|unique:languages,name,NULL,id,deleted_at,NULL' ,

        ];
    }
}
