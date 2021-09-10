<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Apprenant\ApprenantController;
use App\Http\Controllers\Controller;
use App\Models\Apprenant;
use App\Models\Competence;
use App\Models\MiniGroupe;
use App\Models\SessionApprenant;
use App\Models\MiniGroupeApprenant;
use Illuminate\Http\Request;
use App\Models\Session;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    public function compoMinigroup(Array $array)
    {
        $rest = count($array) % 3;
        //echo count($array) . PHP_EOL;
        //echo "rest : " . $rest . PHP_EOL;
        switch($rest) {
            case 1:
                //echo "mini-groupes de 4" . PHP_EOL;
                return 4;
                break;
            default:
                //echo "mini-groupes de 3" . PHP_EOL;
                return 3;
                break;
        }
    }

    public function minigroupNoFilter(Array $array, $nbArray)
    {
        return (array_chunk($array, $nbArray));
    }

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
            ->inRandomOrder()
            ->get()
            ->toArray();
        //dd($this->minigroupNoFilter($apprenant, $this->compoMinigroup($apprenant)));
        $minigroupe = MiniGroupe::where('sessionid', '=', $id)->count();

        return view('session.show')
            ->with(['session' => Session::findOrFail($id), 
            'apprenant' => $apprenant,
            'minigroupe' => $minigroupe]);
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

    public function create_mini_groupe($idSession)
    {
        //creation mini-groupe
        $apprenant = DB::table("apprenant")
            ->select("apprenant.id")
            ->join("sessionapprenant", "apprenant.id", "=", "idApprenant")
            ->where('sessionapprenant.idSession', '=', $idSession)
            ->inRandomOrder()
            ->get()
            ->toArray();
        
        $groupes = $this->minigroupNoFilter($apprenant, $this->compoMinigroup($apprenant));

        foreach($groupes as $groupe => $apprenant) {
            $minigroupe = new MiniGroupe();
            $minigroupe->sessionid = $idSession;
            $minigroupe->save();
            dd($apprenant[$groupe]);
            $minigroupe_apprenant = new MiniGroupeApprenant;
            $minigroupe_apprenant->idminigroupe = $minigroupe->id;
            $minigroupe_apprenant->idapprenant = $apprenant[$groupe];
            $minigroupe_apprenant->save();
        }

        return redirect()->route('session_show', $idSession);
    }
}
