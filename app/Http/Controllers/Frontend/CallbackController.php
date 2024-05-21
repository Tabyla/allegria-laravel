<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CallbackRequest;
use App\Mail\CallbackMail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class CallbackController extends Controller
{
    public function callback(): View
    {
        return view('frontend.emails.callback');
    }

    public function request(CallbackRequest $request): RedirectResponse
    {
        $request->validated();

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        Mail::to('allegriasite@gmail.com')->send(new CallbackMail($details));

        return back()->with('Поздравляю! Ваш вопрос успешно отправлен!');
    }
}
