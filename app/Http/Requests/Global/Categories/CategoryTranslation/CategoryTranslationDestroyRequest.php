<?php


namespace App\Http\Requests\Global\Categories\CategoryTranslation;


use App\Http\Requests\CustomFormRequest;

class CategoryTranslationDestroyRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:category_translation,id,deleted_at,NULL',
        ];
    }
}
