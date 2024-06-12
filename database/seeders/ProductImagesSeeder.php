<?php

declare(strict_types=1);

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImagesSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $products = [1, 2, 3, 4]; // ID товаров
        $images = ['product-1.png', 'product-2.png', 'product-3.png', 'product-4.png'];
        $productImages = [];

        foreach ($products as $index => $productId) {
            foreach ($images as $image) {
                $productImages[] = [
                    'image_path' => $image,
                    'product_id' => $productId,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        DB::table('product_images')->insert($productImages);

        foreach ($products as $index => $productId) {
            $mainImageId = DB::table('product_images')
                ->where('image_path', $images[$index])
                ->where('product_id', $productId)
                ->value('id');

            DB::table('products')
                ->where('id', $productId)
                ->update(['main_image_id' => $mainImageId]);
        }
    }
}
