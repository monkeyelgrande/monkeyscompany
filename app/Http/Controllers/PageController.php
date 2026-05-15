<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home');
    }

    public function servicios(): View
    {
        return view('pages.servicios');
    }

    public function nosotros(): View
    {
        return view('pages.nosotros');
    }

    public function contacto(): View
    {
        return view('pages.contacto');
    }
}
