<?php

declare(strict_types=1);

namespace App\UseCases\Frontend;

use App\Models\Product;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CreateCartCase
{
    public function __construct()
    {
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function handle(int $productId, Product $product): void
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "category" => $product->category->name,
                "image" => $product->mainImage->image_path
            ];
        }

        if ($cart[$productId]['quantity'] <= 0) {
            unset($cart[$productId]);
        }

        session()->put('cart', $cart);
    }
}
