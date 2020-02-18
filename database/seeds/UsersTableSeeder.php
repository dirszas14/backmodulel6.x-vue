<?php

use Illuminate\Database\Seeder;

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
            'name' => 'Dirsza',
            'email' => 'dirszas14@gmail.com',
            'password' => bcrypt('password'),
            'roles_id'  =>1
        ],[
            'name' => 'bandtankk',
            'email' => 'bandtankk@gmail.com',
            'password' => bcrypt('password'),
            'roles_id'  =>2
        ]);
    }
}
