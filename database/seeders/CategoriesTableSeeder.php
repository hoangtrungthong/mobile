<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ["name" => "iPhone", "slug" => "iphone", "parent" => 0],
            ['name' => "Samsung", "slug" => "samsung", "parent" => 0],
            ['name' => "Sony", "slug" => "sony", "parent" => 0],
            ['name' => "Xiaomi", "slug" => "xiaomi", "parent" => 0],
            ['name' => "LG", "slug" => "lg", "parent" => 0],
        ];

        Category::insert($data);
    }
}