<?php


namespace App\Http\Requests\Base\Categories\CategoryToCategory;


use App\Http\Requests\ApiFormRequest;

class CategoryToCategoryUpdateRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'parent_id' 				=> 'required|exists:categories,id,deleted_at,NULL' ,
            'son_id' 					=> 'required|exists:categories,id,deleted_at,NULL' ,
        ];
    }
}
