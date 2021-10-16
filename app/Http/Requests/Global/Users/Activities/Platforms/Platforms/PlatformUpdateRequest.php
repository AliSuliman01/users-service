<?php


namespace App\Http\Requests\Global\Users\Activities\Platforms\Platforms;


use App\Http\Requests\CustomFormRequest;

class PlatformUpdateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:platforms,id,deleted_at,NULL',
            'name' 					=> '' ,

        ];
    }
}