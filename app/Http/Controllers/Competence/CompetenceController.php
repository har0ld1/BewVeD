<?php

namespace App\Http\Controllers\Competence;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Competence;

class CompetenceController extends Controller
{
    protected function index()
    {
        return view('competence.home')->with('competence', Competence::all());
    }

    public function create()
    {
        return view('competence.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'libelle' => ['required','max:30','min:3'],
        ]);

        $competence = new Competence;
        $competence->libelle = $request->libelle;
        $competence->save();

        return redirect('/competence')
            ->with('status', 'Compétence enregistrée avec succès');
    }

    public function show($id)
    {
        return view('competence.edit', [
            'competence' => Competence::findOrFail($id),
        ]);
    }

    public function edit(Request $request)
    {
        request()->validate([
            'libelle' => ['required','max:30','min:3'],
        ]);

        $competence = Competence::findOrFail($request->id);
        $competence->libelle = $request->libelle;
        $competence->save();

        return redirect('/competence')
            ->with('status', 'Compétence modifiée avec succès');
    }

    public function delete($id)
    {
        Competence::destroy($id);
        return back()->with('status', 'Compétence supprimé avec succès');
    }
}
