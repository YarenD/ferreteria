<?php

use App\User;
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
        factory('App\User', 2)->create();
        factory('App\Clasificacion', 2)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
