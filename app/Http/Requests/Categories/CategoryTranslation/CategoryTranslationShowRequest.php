<?php


namespace App\Http\Requests\Categories\CategoryTranslation;


use App\Http\Requests\ApiFormRequest;

class CategoryTranslationShowRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'id'=> 'required|exists:category_translation,id,deleted_at,NULL',
        ];
    }
}
