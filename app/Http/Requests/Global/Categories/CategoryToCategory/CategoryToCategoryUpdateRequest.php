<?php


namespace App\Http\Requests\Global\Categories\CategoryToCategory;


use App\Http\Requests\CustomFormRequest;

class CategoryToCategoryUpdateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:category_to_category,id,deleted_at,NULL',
            'parent_id' 				=> 'required|exists:categories,id,deleted_at,NULL' ,
            'son_id' 					=> 'required|exists:categories,id,deleted_at,NULL' ,
        ];
    }
}
