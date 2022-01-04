<?php


namespace App\Http\Requests\Base\Categories\CategoryTranslation;


use App\Http\Requests\ApiFormRequest;

class CategoryTranslationUpdateRequest extends ApiFormRequest
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
