<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductImage\CreateProductImageRequest;
use App\Http\Requests\Backend\ProductImage\UpdateProductImageRequest;
use App\Models\Product;
use App\Models\ProductImage;
use App\UseCases\Backend\ProductImage\CreateProductImageCase;
use App\UseCases\Backend\ProductImage\UpdateProductImageCase;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductImageController extends Controller
{
    public function index(): View
    {
        $perPage = self::PER_PAGE;
        $images = ProductImage::latest()->orderBy('id', 'DESC')->paginate($perPage);

        return view('backend.product_image.index', [
            'images' => $images,
        ]);
    }

    public function create(): View
    {
        $image = new ProductImage();
        $products = Product::all();

        return view('backend.product_image.create', [
            'image' => $image,
            'products' => $products,
        ]);
    }

    public function store(CreateProductImageRequest $request, CreateProductImageCase $case): RedirectResponse
    {
        $data = $request->validated();
        $imagePath = $request->file('image_path');
        $case->handle($data, $imagePath);

        return redirect('admin/product_image')->with('flash_message', 'Изображение успешно добавлено!');
    }

    public function edit(int $id): View
    {
        $image = ProductImage::findOrFail($id);
        $products = Product::all();

        return view('backend.product_image.edit', [
            'image' => $image,
            'products' => $products,
        ]);
    }

    public function update(int $id, UpdateProductImageRequest $request, UpdateProductImageCase $case): RedirectResponse
    {
        $data = $request->validated();
        $imagePath = $request->file('image_path');
        $image = ProductImage::findOrFail($id);
        $case->handle($data, $imagePath, $image);

        return redirect('admin/product_image')->with('flash_message', 'Изображение успешно отредактировано!');
    }

    public function destroy(int $id): RedirectResponse
    {
        $image = ProductImage::find($id);
        if ($image) {
            $image->delete();
        }

        return redirect('admin/product_image')->with('flash_message', 'Изображение удалено!');
    }
}
