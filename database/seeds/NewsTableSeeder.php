<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert(
            [
                'name' => 'bai viet 1',
                'description' => 'bai viet 1 descriptions',
                'user_id' => 1,
                'category_id' => 1,
                'content' => 'abcdefghklmn',
                'picture' => 'abc.png',
            ]
        );
    }
}
