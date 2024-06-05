<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ChangePasswordRequest;
use App\Http\Requests\Frontend\UpdateAddressRequest;
use App\Models\Product;
use App\UseCases\Frontend\UpdateAddressCase;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();
        $profile = $user->profile;
        $favorites = Product::favoriteProducts($user->id);

        return view(
            'frontend.profile',
            [
                'user' => $user,
                'profile' => $profile,
                'favorites' => $favorites,
            ]
        );
    }

    public function changePassword(ChangePasswordRequest $request): RedirectResponse
    {
        $request->validated();
        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Вы ввели неверный пароль'])->withInput();
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Пароль успешно изменен');
    }

    public function updateAddress(UpdateAddressRequest $request, UpdateAddressCase $case): RedirectResponse
    {
        $address = 'г. ' . $request->city . ', ул. ' . $request->street . ', ' . $request->house . ', кв. ' . $request->apartment;
        $case->handle($address);

        return redirect()->back()->with('success', 'Адрес успешно обновлен');
    }
}
