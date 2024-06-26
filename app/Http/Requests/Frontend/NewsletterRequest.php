<?php

declare(strict_types=1);

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class NewsletterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'newsletterEmail' => ['required', 'email', 'min:5', 'max:30'],
        ];
    }
}
