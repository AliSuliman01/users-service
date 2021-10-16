<?php


namespace App\Http\Requests\Global\Categories\CategoryToCategory;


use App\Http\Requests\CustomFormRequest;

class CategoryToCategoryStoreRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'parent_id' 				=> 'required|exists:categories,id,deleted_at,NULL' ,
			'son_id' 					=> 'required|exists:categories,id,deleted_at,NULL' ,

        ];
    }
}
