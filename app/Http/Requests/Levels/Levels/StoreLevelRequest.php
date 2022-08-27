<?php


namespace App\Http\Requests\Levels\Levels;


use Illuminate\Foundation\Http\FormRequest;

class StoreLevelRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'id'				=> 'integer|required' ,
			'sequence'				=> 'nullable|integer' ,

        ];
    }
}
