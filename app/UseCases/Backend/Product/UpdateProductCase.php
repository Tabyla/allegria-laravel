<?php

declare(strict_types=1);

namespace App\UseCases\Backend\Product;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class UpdateProductCase
{
    public function __construct(
        private readonly ProductImage $productImage,
        private readonly Str $str,
    ) {
    }

    public function handle(Product $product, array $data, ?UploadedFile $imagePath): void
    {
        $product->update([
            'name' => $data['product-name'],
            'price' => $data['price'],
            'description' => $data['description'],
            'alias' => $this->str::slug($data['product-name']),
            'brand_id' => $data['brand_id'],
            'category_id' => $data['category_id'],
        ]);

        if ($imagePath) {
            if ($product->main_image_id) {
                $imageId = $product->main_image_id;
                $product->update([
                    'main_image_id' => null,
                ]);

                $oldImage = ProductImage::find($imageId);
                if ($oldImage) {
                    $oldImage->delete();
                }
            }

            $imageName = time() . '.' . $imagePath->extension();
            $imagePath->move(public_path('images/products/'), $imageName);

            $productImage = ProductImage::create([
                'image_path' => $imageName,
                'product_id' => $product->id,
            ]);

            $product->update([
                'main_image_id' => $productImage->id,
            ]);
        }
    }
}
