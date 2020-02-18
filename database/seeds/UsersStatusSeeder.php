<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_status')->insert([
        ['status_name'=>'actived'],
        ['status_name'=>'not actived'],
        ['status_name'=>'suspend']
        ]);
    }
}
