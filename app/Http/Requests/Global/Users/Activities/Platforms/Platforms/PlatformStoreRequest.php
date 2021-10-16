<?php


namespace App\Http\Requests\Global\Users\Activities\Platforms\Platforms;


use App\Http\Requests\CustomFormRequest;

class PlatformStoreRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'name' 					=> '' ,

        ];
    }
}
