<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ChangePasswordRequest;
use App\Http\Requests\Frontend\UpdateAddressRequest;
use App\Models\Order;
use App\Models\Product;
use App\UseCases\Frontend\UpdateAddressCase;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class ProfileController extends Controller
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index(): View
    {
        $user = auth()->user();
        $profile = $user->profile;
        $favorites = Product::favoriteProducts($user->id);
        $cart = session()->get('cart', []);
        $cartItemsMap = collect(array_map(function($item) { return $item['quantity']; }, $cart));
        $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view(
            'frontend.profile',
            [
                'user' => $user,
                'profile' => $profile,
                'favorites' => $favorites,
                'cart' => $cartItemsMap,
                'orders' => $orders,
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
