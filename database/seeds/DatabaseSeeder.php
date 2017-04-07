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
         DB::table('users')->insert([
	            'name' =>'Christian Flores',
	            'email' => "christian@ovrmind.com",
	   			'password'=>bcrypt(12345), 
	   			'remember_token' => str_random(10),
	   			'created_at'=> new DateTime, 
	            'updated_at'=> new DateTime
	        ]);
    }
}
