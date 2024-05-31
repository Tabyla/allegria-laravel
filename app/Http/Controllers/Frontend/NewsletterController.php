<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\NewsletterRequest;
use App\Mail\NewsletterMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function request(NewsletterRequest $request): RedirectResponse
    {
        $request->validated();

        Mail::to($request->newsletterEmail)->send(new NewsletterMail());

        return back()->with('Поздравляю! Ваш вопрос успешно отправлен!');
    }
}
