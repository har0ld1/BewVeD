<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Apprenant\ApprenantController;
use App\Http\Controllers\Controller;
use App\Models\Apprenant;
use App\Models\Competence;
use App\Models\SessionApprenant;
use Illuminate\Http\Request;
use App\Models\Session;
use Illuminate\Support\Facades\DB;

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
            'libelle' => ['min:4','max:24','required'],
             'date' => ['required']
        ]);

        $session = new Session;
        $session->libelle = $request->libelle;
        $session->date = $request->date;
        $session->save();

        return redirect('/session')->with('status', 'Session enregistrée avec succès');
    }

    public function show($id)
    {
        $apprenant = DB::table("apprenant")
            ->join("sessionapprenant", "apprenant.id", "=", "idApprenant")
            ->where('sessionapprenant.idSession', '=', $id)
            ->get();

        return view('session.show')
            ->with(['session' => Session::findOrFail($id), 'apprenant' => $apprenant]);
    }

    public function remove($id)
    {
        Session::destroy($id);
        return redirect()->route('session')->with('status', 'Session supprimée avec succès');
    }

    public function apprenant($id)
    {
        $apprenant = DB::table("apprenant")
            ->leftJoin("sessionapprenant", "apprenant.id", "=", "idApprenant")
            ->where('sessionapprenant.idSession', '!=', $id)
            ->orWhere('sessionapprenant.idSession', '=', null)
            ->get();

        return view('session.apprenant')
            ->with(['session' => Session::findOrFail($id), 'apprenant' => $apprenant]);
    }

    public function add_apprenant($idSession, $idApprenant)
    {
        $apprenant = new SessionApprenant;
        $apprenant->idSession = $idSession;
        $apprenant->idApprenant = $idApprenant;
        $apprenant->save();
        return redirect()->route('apprenant_add', $idSession)
            ->with('status', 'Apprenant ajouté avec succès à la session');
    }

    public function remove_apprenant($idSession, $idApprenant)
    {
        SessionApprenant::where("idSession", "=", 1)->where("idApprenant", "=", $idApprenant)->delete();
        return redirect()->route('session_show', $idSession);
    }
}
