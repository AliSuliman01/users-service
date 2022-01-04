<?php


namespace App\Http\Requests\Base\Languages;


use App\Http\Requests\ApiFormRequest;

class LanguageDestroyRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:languages,id,deleted_at,NULL',
        ];
    }
}
