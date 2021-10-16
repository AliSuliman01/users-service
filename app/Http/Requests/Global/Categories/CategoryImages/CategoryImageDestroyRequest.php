<?php


namespace App\Http\Requests\Global\Categories\CategoryImages;


use App\Http\Requests\CustomFormRequest;

class CategoryImageDestroyRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:category_images,id,deleted_at,NULL',
        ];
    }
}
