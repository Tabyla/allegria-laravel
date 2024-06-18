<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Product\CreateProductRequest;
use App\Http\Requests\Backend\Product\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\UseCases\Backend\Product\CreateProductCase;
use App\UseCases\Backend\Product\UpdateProductCase;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index(): View
    {
        $perPage = self::PER_PAGE;
        $products = Product::latest()->orderBy('id', 'DESC')->paginate($perPage);

        return view('backend.product.index', [
            'products' => $products,
        ]);
    }

    public function create(): View
    {
        $product = new Product();
        $brands = Brand::all();
        $mainCategories = Category::whereNull('parent_id')->get();
        $subCategories = Category::whereNotNull('parent_id')->get();

        return view('backend.product.create', [
            'product' => $product,
            'brands' => $brands,
            'mainCategories' => $mainCategories,
            'subCategories' => $subCategories,
        ]);
    }

    public function store(CreateProductRequest $request, CreateProductCase $case): RedirectResponse
    {
        $data = $request->validated();
        $imagePath = $request->file('image_path');
        $case->handle($data, $imagePath);

        return redirect('admin/products')->with('flash_message', 'Товар успешно добавлен!');
    }

    public function edit(int $id): View
    {
        $product = Product::findOrFail($id);
        $brands = Brand::all();
        $mainCategories = Category::whereNull('parent_id')->get();
        $subCategories = Category::whereNotNull('parent_id')->get();

        return view('backend.product.edit', [
            'product' => $product,
            'brands' => $brands,
            'mainCategories' => $mainCategories,
            'subCategories' => $subCategories,
        ]);
    }

    public function update(int $id, UpdateProductRequest $request, UpdateProductCase $case): RedirectResponse
    {
        $data = $request->validated();
        $product = Product::findOrFail($id);

        $imagePath = $request->file('image_path');
        $case->handle($product, $data, $imagePath);

        return redirect('admin/products')->with('flash_message', 'Товар успешно отредактирован!');
    }

    public function destroy(int $id): RedirectResponse
    {
        Product::destroy($id);
        $images = ProductImage::getProductImages($id);
        foreach ($images as $image) {
            $image->delete();
        }

        return redirect('admin/products')->with('flash_message', 'Товар удален!');
    }
}
