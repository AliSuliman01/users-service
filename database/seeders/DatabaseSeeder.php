<?php

namespace Database\Seeders;

use App\Domain\Languages\Model\Language;
use App\Domain\Users\Roles\Model\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $defaultData = json_decode(file_get_contents(__DIR__.'/defaultData.json'), true);

        Language::query()->insert($defaultData['languages']);

        Role::query()->insert($defaultData['roles']);

    }
}
