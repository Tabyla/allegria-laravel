<?php

declare(strict_types=1);

namespace App\Http\Requests\Backend\Brand;

use Illuminate\Foundation\Http\FormRequest;

class SaveBrandRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'brand-name' => ['required', 'string', 'min:2', 'max:30'],
        ];
    }
}
