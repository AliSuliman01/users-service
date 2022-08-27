<?php


namespace App\Http\Requests\Levels\LevelTranslation;


use Illuminate\Foundation\Http\FormRequest;

class StoreLevelTranslationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'id'				=> 'integer|required' ,
			'name'				=> 'required|string' ,
			'level_id'				=> 'required|integer' ,
			'language_code'				=> 'required|integer' ,
			'description'				=> 'nullable|string' ,
			'notes'				=> 'nullable|string' ,

        ];
    }
}
