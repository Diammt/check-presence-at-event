<?php

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

        define('NB_CLIENTS', 10);
        define('NB_ASSISTANTS_ADMIN', 3);

        $this->call(UserTableSeeder::class);

    }

}
