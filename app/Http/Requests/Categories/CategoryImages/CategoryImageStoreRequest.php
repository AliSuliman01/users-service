<?php


namespace App\Http\Requests\Categories\CategoryImages;


use App\Http\Requests\ApiFormRequest;

class CategoryImageStoreRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'category_id' 				=> 'required|exists:categories,id,deleted_at,NULL' ,
			'img_src' 					=> 'required' ,

        ];
    }
}
