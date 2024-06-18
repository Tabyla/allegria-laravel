<?php

declare(strict_types=1);

namespace App\Http\Requests\Backend\ProductImage;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductImageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'image_path' => ['required', 'image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
            'product_id' => ['required', 'exists:products,id'],
        ];
    }
}
