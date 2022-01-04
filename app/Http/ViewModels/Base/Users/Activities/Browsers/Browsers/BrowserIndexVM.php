<?php


namespace App\Http\ViewModels\Base\Users\Activities\Browsers\Browsers;

use App\Domain\Base\Users\Activities\Browsers\Browsers\Model\Browser;
use Illuminate\Contracts\Support\Arrayable;

class BrowserIndexVM implements Arrayable
{

    public function get_browsers(){
    	return Browser::all();
	}
    public function toArray(): array
    {
        return $this->get_browsers()->toArray();
    }
}
