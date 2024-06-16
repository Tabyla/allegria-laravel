<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\Product;
use App\Models\Property;
use App\Models\PropertyValue;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CatalogController extends Controller
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index(Request $request): JsonResponse|View
    {
        $sort = $request->get('sort');
        $size = PropertyValue::where('name', $request->get('size_name'))->first();
        $color = PropertyValue::where('name', $request->get('color_name'))->first();
        $brand = $request->get('brand_name');
        $products = Product::productList(
            $sort,
            $size ? $size->id : null,
            $color ? $color->id : null,
            $brand
        );
        $productsCount = $products->count();
        $brandList = Brand::brandList();
        $properties = Property::propertyList();
        $categories = Category::categoryList();
        $favorites = Favorite::where('user_id', auth()->id())->pluck('product_id')->toArray();
        $cart = session()->get('cart', []);
        $cartItemsMap = collect(array_map(function ($item) {
            return $item['quantity'];
        }, $cart));

        if ($request->ajax()) {
            return response()->json($products);
        }

        return view(
            'frontend.catalog',
            [
                'products' => $products,
                'productsCount' => $productsCount,
                'brandList' => $brandList,
                'properties' => $properties,
                'categories' => $categories,
                'favorites' => $favorites,
                'cart' => $cartItemsMap,
            ]
        );
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function showCategory(Request $request, string $alias): JsonResponse|View
    {
        $selectedCategory = Category::where('alias', $alias)->firstOrFail();
        $categoryName = $selectedCategory->name;
        $sort = $request->get('sort');
        $size = PropertyValue::where('name', $request->get('size_name'))->first();
        $color = PropertyValue::where('name', $request->get('color_name'))->first();
        $brand = $request->get('brand_name');
        $products = Product::productList(
            $sort,
            $size ? $size->id : null,
            $color ? $color->id : null,
            $brand,
            $selectedCategory->id
        );
        $productsCount = $products->count();
        $brandList = Brand::brandList();
        $properties = Property::propertyList();
        $categories = Category::categoryList();
        $favorites = Favorite::where('user_id', auth()->id())->pluck('product_id')->toArray();
        $cart = session()->get('cart', []);
        $cartItemsMap = collect(array_map(function ($item) {
            return $item['quantity'];
        }, $cart));

        if ($request->ajax()) {
            return response()->json($products);
        }

        return view(
            'frontend.catalog',
            [
                'products' => $products,
                'categoryName' => $categoryName,
                'productsCount' => $productsCount,
                'brandList' => $brandList,
                'properties' => $properties,
                'categories' => $categories,
                'favorites' => $favorites,
                'cart' => $cartItemsMap,
            ]
        );
    }
}
