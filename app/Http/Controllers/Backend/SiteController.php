<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\View\View;



class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        return view('backend.admin/index');
    }

    public function pages(): View
    {
        $pages = array_map(function ($route) {

            return [
                'URI' => $route->uri(),
                'Server' => $route->getDomain() ?: 'Main',
                'Action' => $route->getActionName(),
                'Methods' => $route->methods(),
                'Name' => $route->getName()
            ];
        }, Route::getRoutes()->get());

        return view('backend.admin/pages', ['pages' => $pages]);
    }

    public function settings(): View
    {
        return view('backend.admin/settings', ['user' => Auth::user()]);
    }
}
