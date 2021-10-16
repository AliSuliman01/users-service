<?php


namespace App\Domain\Global\Users\Activities\Devices\Actions;


use App\Domain\Global\Users\Activities\Devices\DTO\DeviceDTO;
use App\Domain\Global\Users\Activities\Devices\Model\Device;

class DeviceStoreAction
{
    public static function execute(
        DeviceDTO $deviceDTO
    ){
        $new_device = new Device($deviceDTO->toArray());

        $new_device->save();

        return $new_device ;
    }
}
