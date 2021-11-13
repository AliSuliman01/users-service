<?php


namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class MigrationsServiceProvider extends ServiceProvider
{

    public function boot(){
        $this->loadMigrationsFrom([
            'database/migrations/Global/Users',
            'database/migrations/Global/Languages',
            'database/migrations/Global/Activities/Devices',
            'database/migrations/Global/Activities/Platforms',
            'database/migrations/Global/Activities/Browsers',
            'database/migrations/Global/Activities/Activities',

            'database/migrations/Global/Categories',

            'database/migrations/Global/Configs',


        ]);
    }
}
