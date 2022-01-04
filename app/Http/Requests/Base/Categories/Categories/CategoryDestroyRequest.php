<?php


namespace App\Http\Requests\Base\Categories\Categories;


use App\Http\Requests\ApiFormRequest;

class CategoryDestroyRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:categories,id,deleted_at,NULL',
        ];
    }
}
