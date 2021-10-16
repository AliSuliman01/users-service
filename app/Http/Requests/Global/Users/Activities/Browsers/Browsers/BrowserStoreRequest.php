<?php


namespace App\Http\Requests\Global\Users\Activities\Browsers\Browsers;


use App\Http\Requests\CustomFormRequest;

class BrowserStoreRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'name' 					=> '' ,

        ];
    }
}
