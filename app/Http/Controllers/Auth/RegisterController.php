<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function index()
    {
        return view('auth.register');
    }

    protected function create(Request $request)
    {
        $validator = request()->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:formateur'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        return User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->intended('/');
    }

}
