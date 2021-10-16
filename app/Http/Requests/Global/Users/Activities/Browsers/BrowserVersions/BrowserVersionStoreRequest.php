<?php


namespace App\Http\Requests\Global\Users\Activities\Browsers\BrowserVersions;


use App\Http\Requests\CustomFormRequest;

class BrowserVersionStoreRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'browser_id' 					=> '' ,
			'version' 					=> '' ,

        ];
    }
}
