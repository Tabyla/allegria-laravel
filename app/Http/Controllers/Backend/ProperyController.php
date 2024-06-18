<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Property\SavePropertyRequest;
use App\Models\Property;
use App\UseCases\Backend\Property\CreatePropertyCase;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProperyController extends Controller
{
    public function index(): View
    {
        $perPage = self::PER_PAGE;
        $properties = Property::latest()->orderBy('id', 'DESC')->paginate($perPage);

        return view('backend.property.index', [
            'properties' => $properties,
        ]);
    }

    public function create(): View
    {
        $property = new Property();

        return view('backend.property.create', [
            'property' => $property,
        ]);
    }

    public function store(SavePropertyRequest $request, CreatePropertyCase $case): RedirectResponse
    {
        $data = $request->validated();
        $case->handle($data);

        return redirect('admin/property')->with('flash_message', 'Свойство успешно добавлено!');
    }

    public function edit(int $id): View
    {
        $property = Property::findOrFail($id);

        return view('backend.property.edit', [
            'property' => $property,
        ]);
    }

    public function update(int $id, SavePropertyRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $property = Property::findOrFail($id);
        $property->name = $data['property-name'];
        $property->save();

        return redirect('admin/property')->with('flash_message', 'Свойство успешно отредактировано!');
    }

    public function destroy(int $id): RedirectResponse
    {
        Property::destroy($id);

        return redirect('admin/property')->with('flash_message', 'Свойство удалено!');
    }
}
