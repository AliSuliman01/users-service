<?php


namespace App\Http\Requests\Materials\Materials;


use Illuminate\Foundation\Http\FormRequest;

class StoreMaterialRequest extends FormRequest
{
    public function rules(): array
    {
        return [
			'id'				=> 'integer|required' ,
			'duration'				=> 'integer|required' ,
			'level_id'				=> 'integer|required' ,

        ];
    }
}
