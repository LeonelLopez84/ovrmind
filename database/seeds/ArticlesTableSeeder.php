<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker::create();
    	foreach (range(1,50) as $index) {

    		$title=$faker->sentence(3);

	        DB::table('articles')->insert([
	            'title' =>$title,
	            'content' => $faker->paragraph(5),
	            'slug'=> Str::slug($title),
	            'user_id'=>1,
	            'created_at'    => new DateTime, 
	            'updated_at'    => new DateTime
	        ]);
        }
    }
}
