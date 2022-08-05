<?php


namespace App\Http\Requests\Categories\Categories;


use App\Http\Requests\ApiFormRequest;

class CategoryStoreRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'translations' => 'required|array',
            'translations.*.language_id' => 'required|exists:languages,id,deleted_at,NULL',
            'translations.*.name' => 'required|string',
            'translations.*.description' => 'nullable|string',
            'translations.*.notes' => 'nullable|string',
            'images' => 'required|array',
            'images.*.img_src' => 'required|string',
        ];
    }
}
