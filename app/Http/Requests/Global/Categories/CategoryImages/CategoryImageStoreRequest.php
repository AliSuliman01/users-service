<?php


namespace App\Http\Requests\Global\Categories\CategoryImages;


use App\Http\Requests\CustomFormRequest;

class CategoryImageStoreRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'category_id' 				=> 'required|exists:categories,id,deleted_at,NULL' ,
			'img_src' 					=> 'required' ,

        ];
    }
}
