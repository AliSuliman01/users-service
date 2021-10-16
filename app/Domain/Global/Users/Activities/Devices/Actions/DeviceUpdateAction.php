<?php


namespace App\Domain\Global\Users\Activities\Devices\Actions;


use App\Domain\Global\Users\Activities\Devices\DTO\DeviceDTO;
use App\Domain\Global\Users\Activities\Devices\Model\Device;
use Illuminate\Support\Facades\Auth;

class DeviceUpdateAction
{
    public static function execute(
        Device $device,
        DeviceDTO $deviceDTO
    ){
        $device->update($deviceDTO->toArray());
        $device->updated_by_user_id = Auth::id();
        $device->save();
        return $device;
    }
}
