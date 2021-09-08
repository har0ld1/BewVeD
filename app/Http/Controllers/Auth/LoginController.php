<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) 
            // Authentication passed...
            return redirect()->intended('/session');
        
        return redirect('/login');     
    }

    public function logout() 
    {
        Auth::logout();
        return redirect('/login');
    }
}
