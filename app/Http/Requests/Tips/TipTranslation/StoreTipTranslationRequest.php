<?php


namespace App\Http\Requests\Tips\TipTranslation;


use Illuminate\Foundation\Http\FormRequest;

class StoreTipTranslationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'id'				=> 'integer|required' ,
			'name'				=> 'required|string' ,
			'tip_id'				=> 'required|integer' ,
			'language_code'				=> 'required|integer' ,
			'description'				=> 'nullable|string' ,
			'notes'				=> 'nullable|string' ,

        ];
    }
}
