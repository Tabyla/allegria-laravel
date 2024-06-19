<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    public function index(): View
    {
        return view('backend.admin/index');
    }
}
