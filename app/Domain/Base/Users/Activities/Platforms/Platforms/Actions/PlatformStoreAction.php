<?php


namespace App\Domain\Base\Users\Activities\Platforms\Platforms\Actions;


use App\Domain\Base\Users\Activities\Platforms\Platforms\DTO\PlatformDTO;
use App\Domain\Base\Users\Activities\Platforms\Platforms\Model\Platform;
use Illuminate\Support\Facades\Auth;

class PlatformStoreAction
{
    public static function execute(
        PlatformDTO $platformDTO
    ){

        $platform = new Platform($platformDTO->toArray());
        $platform->save();
        return $platform;
    }
}
