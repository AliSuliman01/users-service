<?php


namespace App\Domain\Base\Configs\Actions;


use App\Domain\Base\Configs\DTO\ConfigsDTO;
use App\Domain\Base\Configs\Model\Config;

class SetConfigsAction
{

    public static function execute(
        ConfigsDTO $configsDTO
    ){
            $config = null ;
        if(Config::all()->count() != 0){
            $config = Config::all()[0];
            $config->update(array_filter($configsDTO->all(),'strlen'));
            $config->save();
        }else{
            $config = new Config($configsDTO->all());
            $config->save();
        }
        return $config;
    }
}
