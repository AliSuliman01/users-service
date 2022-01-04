<?php


namespace App\Http\Requests\Base\Categories\CategoryToCategory;


use App\Http\Requests\ApiFormRequest;

class CategoryToCategoryDestroyRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:category_to_category,id,deleted_at,NULL',
        ];
    }
}
