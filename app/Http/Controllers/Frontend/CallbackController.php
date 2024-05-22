<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CallbackRequest;
use App\UseCases\Frontend\CreateCallbackCase;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CallbackController extends Controller
{
    public function callback(): View
    {
        return view('frontend.emails.callback');
    }

    public function request(CallbackRequest $request, CreateCallbackCase $case): RedirectResponse
    {
        $request->validated();

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        $case->handle($details);

        return back()->with('Поздравляю! Ваш вопрос успешно отправлен!');
    }
}
