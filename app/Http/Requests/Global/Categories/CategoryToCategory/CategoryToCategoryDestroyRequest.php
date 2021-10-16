<?php


namespace App\Http\Requests\Global\Categories\CategoryToCategory;


use App\Http\Requests\CustomFormRequest;

class CategoryToCategoryDestroyRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:category_to_category,id,deleted_at,NULL',
        ];
    }
}
