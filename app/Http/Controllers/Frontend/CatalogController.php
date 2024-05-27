<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Property;
use Illuminate\Contracts\View\View;

class CatalogController extends Controller
{
    public function index(): View
    {
        $products = Product::cartsInfo();
        $productsCount = Product::productCount();
        $brandList = Brand::brandList();
        $properties = Property::propertyList();
        $categories = Category::categoryList();

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
}
