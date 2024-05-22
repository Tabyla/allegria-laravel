<?php

declare(strict_types=1);

namespace App\UseCases\Frontend;

use App\Mail\CallbackMail;
use App\Models\Callback;
use Illuminate\Support\Facades\Mail;

class CreateCallbackCase
{
    public function __construct(
        private readonly Callback $callback,
    )
    {
    }

    public function handle(array $data): void
    {
        $this->callback::create($data);
        Mail::to('allegriasite@gmail.com')->send(new CallbackMail($data));
    }
}
