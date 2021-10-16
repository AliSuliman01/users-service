<?php


namespace App\Http\Requests\Global\Users\Activities\Platforms\PlatformVersions;


use App\Http\Requests\CustomFormRequest;

class PlatformVersionStoreRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'platform_id' 					=> '' ,
			'version' 					=> '' ,

        ];
    }
}
