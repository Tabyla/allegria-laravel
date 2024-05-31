<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CallbackRequest;
use App\Models\Callback;
use App\UseCases\Frontend\MakeCallbackCase;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CallbackController extends Controller
{
    public function index(): View
    {
        $perPage = self::PER_PAGE;

        $callbacks = Callback::latest()->orderBy('id', 'DESC')->paginate($perPage);

        return view('backend.callback.index', [
            'callbacks' => $callbacks,
        ]);
    }

    public function destroy(int $id): RedirectResponse
    {
        Callback::destroy($id);

        return redirect('callback')->with('flash_message', 'Инфоромация об обратном звонке удален!');
    }

    public function callback(): View
    {
        return view('frontend.emails.callback');
    }

    public function request(CallbackRequest $request, MakeCallbackCase $case): RedirectResponse
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
