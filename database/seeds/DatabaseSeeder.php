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
        $this->call(UsersRolesSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(UsersStatusSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
