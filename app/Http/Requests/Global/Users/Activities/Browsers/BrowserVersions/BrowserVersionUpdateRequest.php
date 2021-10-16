<?php


namespace App\Http\Requests\Global\Users\Activities\Browsers\BrowserVersions;


use App\Http\Requests\CustomFormRequest;

class BrowserVersionUpdateRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:browser_versions,id,deleted_at,NULL',
            'browser_id' 					=> '' ,
			'version' 					=> '' ,

        ];
    }
}
