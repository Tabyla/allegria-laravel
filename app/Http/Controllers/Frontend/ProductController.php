<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\PropertyValue;
use Illuminate\Contracts\View\View;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class ProductController extends Controller
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index(string $alias): View
    {
        $productId = Product::query()->where('products.alias', '=', $alias)->select('id')->firstOrFail();
        $product = Product::productInfo($productId->id);
        $sizes = PropertyValue::productSizes($productId->id);
        $colors = PropertyValue::productColors($productId->id);
        $productImages = ProductImage::productImages($productId->id);
        $cart = session()->get('cart', []);
        $cartItemsMap = collect(array_map(function($item) { return $item['quantity']; }, $cart));

        return view(
            'frontend.product',
            [
                'product' => $product,
                'sizes' => $sizes,
                'colors' => $colors,
                'productImages' => $productImages,
                'productId' => $productId->id,
                'cart' => $cartItemsMap,
            ]
        );
    }
}
