<?php


namespace App\Http\Requests\Global\Languages;


use App\Http\Requests\CustomFormRequest;

class LanguageShowRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id'=> 'required|exists:languages,id,deleted_at,NULL',
        ];
    }
}
