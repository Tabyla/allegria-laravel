<?php

declare(strict_types=1);

namespace App\UseCases\Backend\ProductImage;

use App\Models\ProductImage;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Http\UploadedFile;

class UpdateProductImageCase
{
    public function __construct(
        private readonly Hasher $hasher,
    ) {
    }

    public function handle(array $data, ?UploadedFile $imagePath, ProductImage $image): void
    {
        if ($imagePath) {
            $imageName = time() . '.' . $imagePath->extension();

            if (file_exists(public_path('images/products/' . $image->image_path))) {
                unlink(public_path('images/products/' . $image->image_path));
            }

            $imagePath->move(public_path('images/products/'), $imageName);
            $image->image_path = $imageName;
        }
        $image->product_id = $data['product_id'];
        $image->save();
    }
}
