<?php

declare(strict_types=1);

namespace App\Http\Requests\Backend\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'product-name' => ['required', 'string', 'min:2', 'max:30'],
            'price' => ['required', 'numeric', 'min:0.01'],
            'description' => ['required', 'string'],
            'brand_id' => ['required', 'exists:brands,id'],
            'category_id' => ['required', 'exists:categories,id'],
            'image_path' => ['sometimes', 'nullable', 'image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
        ];
    }
}
