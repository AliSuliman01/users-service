<?php


namespace App\Http\Requests\Global\Categories\CategoryTranslation;


use App\Http\Requests\CustomFormRequest;

class CategoryTranslationUpdateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:category_translation,id,deleted_at,NULL',
            'category_id' 					=> 'required|exists:categories,id,deleted_at,NULL' ,
            'language_id' 					=> 'required|exists:languages,id,deleted_at,NULL' ,
            'name' 					=> 'nullable|string' ,
            'description' 					=> 'nullable|string' ,
            'notes' 					=> 'nullable|string' ,

        ];
    }
}
