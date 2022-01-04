<?php


namespace App\Http\Requests\Base\Categories\CategoryImages;


use App\Http\Requests\ApiFormRequest;

class CategoryImageUpdateRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'category_id' 				=> 'required|exists:categories,id,deleted_at,NULL' ,
            'img_src' 					=> 'required' ,

        ];
    }
}
