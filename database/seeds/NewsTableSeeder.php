<?php

use Illuminate\Database\Seeder;
use App\News;
use App\User;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('news')->insert(
        //     [
        //         'name' => 'bai viet 1',
        //         'description' => 'bai viet 1 descriptions',
        //         'user_id' => 1,
        //         'category_id' => 1,
        //         'content' => 'abcdefghklmn',
        //         'picture' => 'abc.png',
        //     ]
        // );
        $author1 = User::where('email', 'pv1@allaravel.dev')->first();
        $author2 = User::where('email', 'pv2@allaravel.dev')->first();
        $faker = Faker\Factory::create();
      // $faker->unique(true);
        for ($i=0; $i < 10; $i++) { 
        	$name = $faker->unique()->sentence($nbWords = 6, $variableNbWords = true);
        	$news = News::create([
	            'name' => $name, 
                'content' => $faker->text($maxNbChars = 1000),
                'description' => $faker->text($maxNbChars = 80),
	            'slug' => str_slug($name),
	            'published' => rand(0,1),
                'user_id' => $author1->id,
                'picture' => 'abc.png',
                'category_id' => 1,
	        ]);
	        $title = $faker->unique()->sentence($nbWords = 6, $variableNbWords = true);
        	$news = News::create([
	            'name' => $name, 
                'content' => $faker->text($maxNbChars = 1000),
                'description' => $faker->text($maxNbChars = 80),
	            'slug' => str_slug($title),
	            'published' => rand(0,1),
                'user_id' => $author2->id,
                'picture' => 'abc.png',
                'category_id' => 1,
	        ]);
        }
    }
}
