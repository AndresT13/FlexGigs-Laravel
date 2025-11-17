<?php

namespace App\Http\Controllers;

class StaticPageController extends Controller
{
    public function terms()
    {
        return view('pages.terms');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function help()
    {
        return view('pages.help');
    }

    public function login()
    {
        return view('pages.login');
    }
}
