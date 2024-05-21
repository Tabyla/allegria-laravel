<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class SiteController extends Controller
{
    public function index(): View
    {
        return view('index');
    }

    public function about(): View
    {
        return view('frontend.about');
    }

    public function brands(): View
    {
        return view('frontend.brands');
    }

    public function questions(): View
    {
        return view('frontend.questions');
    }
}
