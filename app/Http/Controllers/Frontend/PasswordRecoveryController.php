<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\PasswordRecoveryRequest;
use App\Models\User;
use App\UseCases\Frontend\SendPasswordRecoveryCase;
use App\UseCases\Frontend\SendRecoveryLinkCase;
use Illuminate\Http\RedirectResponse;

class PasswordRecoveryController extends Controller
{
    protected SendRecoveryLinkCase $sendRecoveryLinkCase;
    protected SendPasswordRecoveryCase $sendNewPasswordCase;

    public function __construct(
        SendRecoveryLinkCase $sendRecoveryLinkCase,
        SendPasswordRecoveryCase $sendNewPasswordCase
    ) {
        $this->sendRecoveryLinkCase = $sendRecoveryLinkCase;
        $this->sendNewPasswordCase = $sendNewPasswordCase;
    }

    public function request(PasswordRecoveryRequest $request): RedirectResponse
    {
        $request->validated();

        $user = User::where('email', $request->recoveryEmail)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['recoveryEmail' => 'Пользователь с таким Email не существует']
            )->withInput();
        }

        $this->sendRecoveryLinkCase->handle($user);

        return back()->with('status', 'Поздравляю! Ваш вопрос успешно отправлен!');
    }

    public function send(int $id): RedirectResponse
    {
        $user = User::where('id', $id)->first();

        $this->sendNewPasswordCase->handle($user);

        return back()->with('status', 'Поздравляю! Ваш вопрос успешно отправлен!');
    }
}
