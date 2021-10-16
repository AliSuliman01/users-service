<?php


namespace App\Domain\Global\Users\Activities\Platforms\Platforms\Actions;


use App\Domain\Global\Users\Activities\Platforms\Platforms\DTO\PlatformDTO;
use App\Domain\Global\Users\Activities\Platforms\Platforms\Model\Platform;
use Illuminate\Support\Facades\Auth;

class PlatformUpdateAction
{

    public static function execute(
        PlatformDTO $platformDTO
    ){
        $platform = Platform::find($platformDTO->id);
        $platform->update(array_filter($platformDTO->toArray()));
        $platform->save();
        return $platform;
    }
}
