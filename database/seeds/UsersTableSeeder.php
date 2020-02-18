<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'name' => 'Dirsza',
            'email' => 'dirszas14@gmail.com',
            'password' => bcrypt('password'),
            'roles_id'  =>1,
            'users_status_id'=>1
        ],[
            'name' => 'bandtankk',
            'email' => 'bandtankk@gmail.com',
            'password' => bcrypt('password'),
            'roles_id'  =>2,
            'users_status_id'=>2
        ]
        ]);
    }
}
