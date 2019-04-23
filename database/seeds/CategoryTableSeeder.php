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
            ['name' => 'Cầu Lông', 'parent_id' => '0','description' => 'Danh muc The Thao'],
            ['name' => 'Bơi Lội', 'parent_id' => '0','description' => 'Danh muc Van Hoa'],
            ['name' => 'Bóng Đá', 'parent_id' => '0','description' => 'Danh muc Xa Hoi']
        );
    }
}
