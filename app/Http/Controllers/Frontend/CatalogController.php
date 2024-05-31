<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Property;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request): JsonResponse|View
    {
        $products = Product::productList();
        $productsCount = Product::productCount();
        $brandList = Brand::brandList();
        $properties = Property::propertyList();
        $categories = Category::categoryList();

        if ($request->ajax()) {
            return response()->json($products);
        }

        return view('frontend.catalog',
            [
                'products' => $products,
                'productsCount' => $productsCount,
                'brandList' => $brandList,
                'properties' => $properties,
                'categories' => $categories
            ]
        );
    }

    public function showCategory(Request $request, string $alias): JsonResponse|View
    {
        $selectedCategory = Category::where('alias', $alias)->firstOrFail();
        $categoryName = $selectedCategory->name;
        $products = Product::selectedProductList($selectedCategory->id);
        $productsCount = Product::selectedProductCount($selectedCategory->id);
        $brandList = Brand::brandList();
        $properties = Property::propertyList();
        $categories = Category::categoryList();

        if ($request->ajax()) {
            return response()->json($products);
        }

        return view('frontend.catalog',
            [
                'products' => $products,
                'categoryName' => $categoryName,
                'productsCount' => $productsCount,
                'brandList' => $brandList,
                'properties' => $properties,
                'categories' => $categories
            ]
        );
    }
}
