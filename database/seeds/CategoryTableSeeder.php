<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            ['name' => 'The Thao', 'parent_id' => '0','description' => 'Danh muc The Thao'],
            ['name' => 'Van Hoa', 'parent_id' => '0','description' => 'Danh muc Van Hoa'],
            ['name' => 'Xa Hoi', 'parent_id' => '0','description' => 'Danh muc Xa Hoi']
        );
    }
}
