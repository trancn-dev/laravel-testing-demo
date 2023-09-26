<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function postLogin(Request $request)
    {
        return redirect("dashboard")->withSuccess('You have Successfully loggedin');
    }
}
