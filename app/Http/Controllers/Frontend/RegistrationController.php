<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\RegistrationRequest;
use App\UseCases\Frontend\RegistrationUserCase;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(): View
    {
        return view('frontend.reg',);
    }

    public function register(RegistrationRequest $request, RegistrationUserCase $case): RedirectResponse
    {
        $data = $request->validated();
        $case->handle($data);

        return redirect()->route('/');
    }
}
