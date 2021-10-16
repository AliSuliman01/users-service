<?php


namespace App\Http\Requests\Global\Languages;


use App\Http\Requests\CustomFormRequest;

class LanguageUpdateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:languages,id,deleted_at,NULL',
            'name' 		=> 'nullable|unique:languages,name,NULL,id,deleted_at,NULL' ,
            'abbrev' 	=> 'nullable|unique:languages,name,NULL,id,deleted_at,NULL' ,
        ];
    }
}
