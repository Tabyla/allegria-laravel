<?php

declare(strict_types=1);

namespace App\Http\Requests\Backend\Property;

use Illuminate\Foundation\Http\FormRequest;

class SavePropertyRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'property-name' => ['required', 'string', 'min:2', 'max:30'],
        ];
    }
}
