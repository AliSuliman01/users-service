<?php


namespace App\Domain\Global\Users\Activities\Browsers\Browsers\Actions;


use App\Domain\Global\Users\Activities\Browsers\Browsers\DTO\BrowserDTO;
use App\Domain\Global\Users\Activities\Browsers\Browsers\Model\Browser;
use Illuminate\Support\Facades\Auth;

class BrowserDestroyAction
{
    public static function execute(
        BrowserDTO   $browserDTO
    ){

        $browser = Browser::find($browserDTO->id);
        $browser->delete();
        return $browser;
    }
}
