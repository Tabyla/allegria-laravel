<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\PropertyValue;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    public function index(string $alias): View
    {
        $productId = Product::query()->where('products.alias', '=', $alias)->select('id')->firstOrFail();
        $product = Product::productInfo($productId->id);
        $sizes = PropertyValue::productSizes($productId->id);
        $colors = PropertyValue::productColors($productId->id);
        $productImages = ProductImage::productImages($productId->id);

        return view(
            'frontend.product',
            [
                'product' => $product,
                'sizes' => $sizes,
                'colors' => $colors,
                'productImages' => $productImages,
            ]
        );
    }
}
