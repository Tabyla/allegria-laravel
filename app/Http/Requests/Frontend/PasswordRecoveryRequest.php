<?php

declare(strict_types=1);

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRecoveryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'recoveryEmail' => ['required', 'email', 'min:5', 'max:30'],
        ];
    }
}
