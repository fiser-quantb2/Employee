<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
    }
}

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // add record to table 'users'
        DB::table('users')->insert([
        	'username' => 'admin',
        	'password' => bcrypt('123456'),
        	'email' => 'zzbynzz@gmail.com',
        	'active' => 1,
        	]);
    }
}

