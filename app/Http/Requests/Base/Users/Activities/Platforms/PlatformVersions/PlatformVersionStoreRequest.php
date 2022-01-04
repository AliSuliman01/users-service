<?php


namespace App\Http\Requests\Base\Users\Activities\Platforms\PlatformVersions;


use App\Http\Requests\ApiFormRequest;

class PlatformVersionStoreRequest extends ApiFormRequest
{
    public function rules(): array
    {
        return [
            'platform_id' 					=> '' ,
			'version' 					=> '' ,

        ];
    }
}
