<?php

declare(strict_types=1);

namespace App\UseCases\Backend\ProductImage;

use App\Models\ProductImage;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Http\UploadedFile;

class CreateProductImageCase
{
    public function __construct(
        private readonly ProductImage $productImage,
    ) {
    }

    public function handle(array $data, UploadedFile $imagePath): void
    {
        $imageName = time() . '.' . $imagePath->extension();
        $imagePath->move(public_path('images/products/'), $imageName);
        $this->productImage->image_path = $imageName;
        $this->productImage->product_id = $data['product_id'];
        $this->productImage->save();
    }
}
