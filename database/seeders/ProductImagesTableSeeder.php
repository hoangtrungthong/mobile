<?php

namespace Database\Seeders;

use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ["product_id" => 1, "path" => "images/products/iphone-x.jpeg"],
            ["product_id" => 1, "path" => "images/products/iphone-x.png"],
            ["product_id" => 2, "path" => "images/products/62edc97e8ed6d-iphone-11-pro-max-note.jpg"],
            ["product_id" => 2, "path" => "images/products/iphone-11.jpg"],
            ["product_id" => 3, "path" => "images/products/galaxy-z-fold1.jpeg"],
            ["product_id" => 3, "path" => "images/products/galaxy-z-fold.jpeg"],
            ["product_id" => 4, "path" => "images/products/experia-z1.jpeg"],
            ["product_id" => 4, "path" => "images/products/experia-z1-1.jpeg"],
            ["product_id" => 5, "path" => "images/products/mi-11.jpeg"],
            ["product_id" => 5, "path" => "images/products/mi-11-1.jpeg"],
            ["product_id" => 6, "path" => "images/products/blackshark.jpeg"],
            ["product_id" => 6, "path" => "images/products/bl.jpeg"],
            ["product_id" => 7, "path" => "images/products/lg-v40-thinq-black-600x600.jpg"],
            ["product_id" => 7, "path" => "images/products/lg-v40-thinq-3.jpg"],
        ];

        ProductImage::insert($data);
    }
}
