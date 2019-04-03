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
            ['name' => 'The Thao', 'id_parent' => '0','description' => 'Danh muc The Thao'],
            ['name' => 'Van Hoa', 'id_parent' => '0','description' => 'Danh muc Van Hoa'],
            ['name' => 'Xa Hoi', 'id_parent' => '0','description' => 'Danh muc Xa Hoi']
        );
    }
}
