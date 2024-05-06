<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Etudiant;
use App\Models\Section;
use App\Models\Typeannonce;
use App\Models\MotifAction;
use App\Models\Journalisation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModerationController extends Controller
{

    public function getAllAnnonces(){
        if (Auth::user()->etudiant->moderateur){
            $annonces = Annonce::where('date', '>', now())->get(); 
            $types = Typeannonce::all();
            return view('moderation.allAnnonces', ['annonces' => $annonces , 'types' => $types]);
        }
        return redirect()->back();
    }

    function getAnnonce(Annonce $annonce)
    {
        $types = Typeannonce::all();
        $motifs = MotifAction::all();
        return view('moderation.reportAnnonce', ['annonce' => $annonce, 'types' => $types, 'motifs' => $motifs]);
    }

    function getEtudiant(Etudiant $etudiant)
    {
        
        $motifs = MotifAction::all(); 
        $section = Section::all();
        return view('moderation.reportUser', ['etudiant' => $etudiant, 'motifs' => $motifs,'section' => $section]);
    }

    public function store(Request $request)
    {
        // On récupère les données du formulaire
        $dataAnnonce = $request->only(['idAnnonce', 'idEtudiant', 'idMotif', 'Description']);
        $dataAnnonce['idUtilisateur'] = Auth::user()->idU;
        $dataAnnonce['idTypeAction'] = 3;

        // Vérifie si la case à cocher "Cacher l'annonce" est cochée
        $dataAnnonce['cache'] = $request->has('hideAnnounce') ? 1 : 0;


        if ($dataAnnonce['idMotif'] == null || $dataAnnonce['Description'] == null) {
            return redirect()->back()->with('error', 'Veuillez préciser le motif du signalement et indiquer la raison !');
        }
        Journalisation::create($dataAnnonce);

        if ($dataAnnonce['cache'] == 1) {
            Annonce::where('idA', $dataAnnonce['idAnnonce'])->update(['cache' => 1]);
        }

        $annonces = Annonce::all();
        return redirect()->route('dashboard')->with('success', 'Signalement envoyé !');
    }
}
