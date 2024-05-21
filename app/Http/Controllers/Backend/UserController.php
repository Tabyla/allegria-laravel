<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Backend\User\CreateUserRequest;
use App\Http\Requests\Backend\User\UpdateUserRequest;
use App\Models\User;
use App\UseCases\Backend\User\CreateUserCase;
use App\UseCases\Backend\User\UpdateUserCase;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(): View
    {
        $perPage = self::PER_PAGE;

        $users = User::latest()->orderBy('id', 'DESC')->paginate($perPage);

        return view('backend.user.index', [
            'users' => $users,
        ]);
    }

    public function create(): View
    {
        $roles = Role::pluck('name', 'id')->all();
        $user = new User();

        return view('backend.user.create', [
            'roles' => $roles,
            'user' => $user,
        ]);
    }

    public function store(CreateUserRequest $request, CreateUserCase $case): RedirectResponse
    {
        $data = $request->validated();
        $case->handle($data);

        return redirect('user')->with('flash_message', 'Пользователь успешно добавлен!');
    }

    public function edit(int $id): View
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();

        return view('backend.user.edit', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function update(int $id, UpdateUserRequest $request, UpdateUserCase $case): RedirectResponse
    {
        $data = $request->validated();
        $case->handle($id, $data);

        return redirect('user')->with('flash_message', 'Пользователь успешно отредактирован!');
    }

    public function destroy(int $id): RedirectResponse
    {
        $user = Auth::user()?->id;
        if ($id === $user) {
            return redirect('user')->with('alert', 'Вы не можете удалить самого себя');
        }
        User::destroy($id);

        return redirect('user')->with('flash_message', 'Пользователь удален!');
    }
}
