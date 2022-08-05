<?php


namespace App\Domain\Configs\Observer;


use App\Domain\Configs\Model\Config;
use Illuminate\Support\Facades\Auth;

class ConfigObserver
{
    public function created(Config $config)
    {
        $config->created_by_user_id = Auth::id();
    }

    public function updated(Config $config)
    {
        $config->updated_by_user_id = Auth::id();
    }

    public function deleted(Config $config)
    {
        $config->deleted_by_user_id = Auth::id();
    }

    public function restored(Config $config)
    {
        //
    }
    public function forceDeleted(Config $config)
    {
        //
    }
}
