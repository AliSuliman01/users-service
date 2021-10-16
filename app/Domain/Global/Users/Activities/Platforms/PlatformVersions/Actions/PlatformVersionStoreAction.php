<?php


namespace App\Domain\Global\Users\Activities\Platforms\PlatformVersions\Actions;


use App\Domain\Global\Users\Activities\Platforms\PlatformVersions\DTO\PlatformVersionDTO;
use App\Domain\Global\Users\Activities\Platforms\PlatformVersions\Model\PlatformVersion;
use Illuminate\Support\Facades\Auth;

class PlatformVersionStoreAction
{
    public static function execute(
        PlatformVersionDTO $platformVersionDTO
    ){

        $platformVersion = new PlatformVersion($platformVersionDTO->toArray());
        $platformVersion->save();
        return $platformVersion;
    }
}
