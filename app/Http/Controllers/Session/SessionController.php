<?php

namespace App\Http\Controllers\Session;

use App\Models\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{

    protected function index()
    {
        return view('session.home')->with('session', Session::all());
    }

    public function create()
    {
        return view('session.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'libelle' => 'min:4,max:24,required',
             'date' => 'required'
        ]);

        $session = new Session;
        $session->libelle = $request->libelle;
        $session->date = $request->date;
        $session->save();

        return redirect('/session')->with('status', 'Session enregistrée avec succès');
    }
}
