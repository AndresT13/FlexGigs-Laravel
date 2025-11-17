<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
     public function send(Request $request)
    {
      return view('main-pages.pages.login');
}
}