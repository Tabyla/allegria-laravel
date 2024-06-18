<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Brand\SaveBrandRequest;
use App\Models\Brand;
use App\UseCases\Backend\Brand\CreateBrandCase;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class BrandController extends Controller
{
    public function index(): View
    {
        $perPage = self::PER_PAGE;
        $brands = Brand::latest()->orderBy('id', 'DESC')->paginate($perPage);

        return view('backend.brand.index', [
            'brands' => $brands,
        ]);
    }

    public function create(): View
    {
        $brand = new Brand();

        return view('backend.brand.create', [
            'brand' => $brand,
        ]);
    }

    public function store(SaveBrandRequest $request, CreateBrandCase $case): RedirectResponse
    {
        $data = $request->validated();
        $case->handle($data);

        return redirect('admin/brand')->with('flash_message', 'Бренд успешно добавлен!');
    }

    public function edit(int $id): View
    {
        $brand = Brand::findOrFail($id);

        return view('backend.brand.edit', [
            'brand' => $brand,
        ]);
    }

    public function update(int $id, SaveBrandRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $brand = Brand::findOrFail($id);
        $brand->name = $data['brand-name'];
        $brand->save();

        return redirect('admin/brand')->with('flash_message', 'Бренд успешно отредактирован!');
    }

    public function destroy(int $id): RedirectResponse
    {
        Brand::destroy($id);

        return redirect('admin/brand')->with('flash_message', 'Бренд удален!');
    }
}
