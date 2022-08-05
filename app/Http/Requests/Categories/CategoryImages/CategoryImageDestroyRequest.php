<?php


namespace App\Http\Requests\Categories\CategoryImages;


use App\Http\Requests\ApiFormRequest;

class CategoryImageDestroyRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:category_images,id,deleted_at,NULL',
        ];
    }
}
