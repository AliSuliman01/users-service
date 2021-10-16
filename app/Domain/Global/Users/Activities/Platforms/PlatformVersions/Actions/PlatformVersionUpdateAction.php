<?php


namespace App\Domain\Global\Users\Activities\Platforms\PlatformVersions\Actions;


use App\Domain\Global\Users\Activities\Platforms\PlatformVersions\DTO\PlatformVersionDTO;
use App\Domain\Global\Users\Activities\Platforms\PlatformVersions\Model\PlatformVersion;
use Illuminate\Support\Facades\Auth;

class PlatformVersionUpdateAction
{

    public static function execute(
        PlatformVersionDTO $platformVersionDTO
    ){
        $platformVersion = PlatformVersion::find($platformVersionDTO->id);
        $platformVersion->update(array_filter($platformVersionDTO->toArray()));
        $platformVersion->save();
        return $platformVersion;
    }
}
