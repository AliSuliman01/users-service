<?php


namespace App\Http\Requests\Global\Users\Activities\Browsers\Browsers;


use App\Http\Requests\CustomFormRequest;

class BrowserDestroyRequest extends CustomFormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:browsers,id,deleted_at,NULL',
        ];
    }
}
