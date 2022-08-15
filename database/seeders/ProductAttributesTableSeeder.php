<?php

namespace Database\Seeders;

use App\Models\ProductAttribute;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "product_id" => 1, "color_id" => 4, "memory_id" => 8, "price" => 6000000, "export_price" => 7800000, "sale_price" => 0, "quantity" => 100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                "product_id" => 1, "color_id" => 4, "memory_id" => 7, "price" => 6000000, "export_price" => 7800000, "sale_price" => 0, "quantity" => 100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                "product_id" => 2, "color_id" => 4, "memory_id" => 8, "price" => 10000000, "export_price" => 13000000, "sale_price" => 0, "quantity" => 100, 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                "product_id" => 2, "color_id" => 4, "memory_id" => 7, "price" => 10000000, "export_price" => 13000000, "sale_price" => 0, "quantity" => 100, 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                "product_id" => 3, "color_id" => 4, "memory_id" => 8, "price" => 20000000, "export_price" => 26000000, "sale_price" => 0, "quantity" => 100, 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                "product_id" => 3, "color_id" => 4, "memory_id" => 7, "price" => 20000000, "export_price" => 26000000, "sale_price" => 0, "quantity" => 100, 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                "product_id" => 4, "color_id" => 4, "memory_id" => 8, "price" => 5000000, "export_price" => 6500000, "sale_price" => 0, "quantity" => 100, 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                "product_id" => 4, "color_id" => 4, "memory_id" => 7, "price" => 5000000, "export_price" => 6500000, "sale_price" => 0, "quantity" => 100, 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                "product_id" => 5, "color_id" => 4, "memory_id" => 8, "price" => 12000000, "export_price" => 15600000, "sale_price" => 0, "quantity" => 100, 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                "product_id" => 5, "color_id" => 4, "memory_id" => 7, "price" => 12000000, "export_price" => 15600000, "sale_price" => 0, "quantity" => 100, 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                "product_id" => 6, "color_id" => 4, "memory_id" => 8, "price" => 12000000, "export_price" => 15600000, "sale_price" => 0, "quantity" => 100, 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                "product_id" => 6, "color_id" => 4, "memory_id" => 7, "price" => 12000000, "export_price" => 15600000, "sale_price" => 0, "quantity" => 100, 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                "product_id" => 7, "color_id" => 4, "memory_id" => 8, "price" => 5000000, "export_price" => 6500000, "sale_price" => 0, "quantity" => 100, 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                "product_id" => 7, "color_id" => 4, "memory_id" => 7, "price" => 5000000, "export_price" => 6500000, "sale_price" => 0, "quantity" => 100, 'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        ProductAttribute::insert($data);
    }
}