<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')
            ->except('logout');
    }

    protected function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials))
            // Authentication passed...
            return redirect('/session')->with('status', 'Vous êtes maintenant authentifié');

        return back()->with('status', 'Identifants non valide');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
