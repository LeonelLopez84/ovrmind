<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $i=1;
    	foreach (range(1,50) as $index) {
	        DB::table('images')->insert([
	            'name' => str_replace("./storage/app/public\\",'',$faker->image('./storage/app/public', $width = 640, $height = 480)),
	            'extension' => 'jpg',
	            'article_id'=> $i,
	            'created_at'=> new DateTime, 
	            'updated_at'=> new DateTime
	        ]);
	        ++$i;
        }
    }
}
