<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagementController extends Controller
{
    public function searchAnnonce(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $annonces = \App\Models\Annonce::all();
        $types = \App\Models\Typeannonce::all();
        $annonceController = new \App\Http\Controllers\AnnonceController();

        $query = Annonce::query();

        if ($request->typeAnnonce) {
            $query->where('idT', $request->typeAnnonce);
        }
        
        if ($request->titreA) {
            $query->where('titreA', 'like', '%'.$request->titreA.'%');
        }

        if ($request->typeEvenement) {
            switch ($request->typeEvenement) {
                case 1:
                    $query->whereHas('evenement_sportif');
                    break;
                case 2:
                    $query->whereHas('cinema');
                    break;
                case 3:
                    $query->whereHas('covoiturage');
                    break;
                case 4:
                    $query->whereHas('loisir');
                    break;
                case 5:
                    $query->whereHas('competence');
                    break;
                case 6:
                    $query->whereHas('lecture');
                    break;
            }
        }
        
        $annonces = $query->get();

        if ($request->disponible) {
            $annonces = $annonces->filter(function ($annonce) use ($annonceController) {
                return $annonceController->nbPlaceRestante($annonce) > 0;
            });
        }
        return view('dashboard', ['annonces' => $annonces, 'types' => $types]);
    }
}

