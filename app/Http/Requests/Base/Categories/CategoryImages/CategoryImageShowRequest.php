<?php


namespace App\Http\Requests\Base\Categories\CategoryImages;


use App\Http\Requests\ApiFormRequest;

class CategoryImageShowRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'id'=> 'required|exists:category_images,id,deleted_at,NULL',
        ];
    }
}
