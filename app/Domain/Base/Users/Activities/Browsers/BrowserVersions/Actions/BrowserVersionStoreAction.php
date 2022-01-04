<?php


namespace App\Domain\Base\Users\Activities\Browsers\BrowserVersions\Actions;


use App\Domain\Base\Users\Activities\Browsers\BrowserVersions\DTO\BrowserVersionDTO;
use App\Domain\Base\Users\Activities\Browsers\BrowserVersions\Model\BrowserVersion;
use Illuminate\Support\Facades\Auth;

class BrowserVersionStoreAction
{
    public static function execute(
        BrowserVersionDTO $browserVersionDTO
    ){

        $browserVersion = new BrowserVersion($browserVersionDTO->toArray());
        $browserVersion->save();
        return $browserVersion;
    }
}
