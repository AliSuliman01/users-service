<?php


namespace App\Http\Requests\Global\Categories\CategoryTranslation;


use App\Http\Requests\CustomFormRequest;

class CategoryTranslationStoreRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'category_id' 					=> 'required|exists:categories,id,deleted_at,NULL' ,
			'language_id' 					=> 'required|exists:languages,id,deleted_at,NULL' ,
			'name' 					=> 'nullable|string' ,
			'description' 					=> 'nullable|string' ,
			'notes' 					=> 'nullable|string' ,

        ];
    }
}
