<?php

namespace App\Http\Controllers\Apprenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apprenant;
use App\Models\Competence;

class ApprenantController extends Controller
{
    protected function index()
    {
        return view('apprenant.home')->with('apprenant', Apprenant::all());
    }

    public function create()
    {
        return view('apprenant.create')->with('competences', Competence::all());
    }

    public function store(Request $request)
    {
        request()->validate([
            'lastname' => ['required', 'min:1', 'max:50'],
            'firstname' => ['required', 'min:1', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:apprenant'],
            'gender' => ['required'],
            'age' => ['required'],
        ]);
        $apprenant = new Apprenant;
        $apprenant->lastname = $request->lastname;
        $apprenant->firstname = $request->firstname;
        $apprenant->email = $request->email;
        $apprenant->gender = $request->gender;
        $apprenant->age = $request->age;
        foreach($apprenant->competences as $competence) {
            $competence = $request->skill;
        }
        $apprenant->save();

        return redirect('/apprenant')->with('status', 'Apprenant enregistré avec succès');
    }

    public function show($id)
    {
        return view('apprenant.edit', [
            'apprenant' => Apprenant::findOrFail($id),
        ]);
    }

    public function edit(Request $request, $id)
    {
        $apprenant = Apprenant::findOrFail($request->id);
        if($apprenant->email !== $request->email) {
            $validatedData = request()->validate([
                'lastname' => ['required', 'min:1', 'max:50'],
                'firstname' => ['required', 'min:1', 'max:50'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:apprenant'],
                'gender' => ['required'],
                'age' => ['required'],
            ]);
        } else {
            $validatedData = request()->validate([
                'lastname' => ['required', 'min:1', 'max:50'],
                'firstname' => ['required', 'min:1', 'max:50'],
                'gender' => ['required'],
                'age' => ['required'],
            ]);
        }
        Apprenant::whereId($id)->update($validatedData);
        return redirect('/apprenant')
            ->with('status', 'Apprenant modifié avec succès');
    }

    public function delete($id)
    {
        Apprenant::destroy($id);
        return back()->with('status', 'Apprenant supprimé avec succès');
    }
}
