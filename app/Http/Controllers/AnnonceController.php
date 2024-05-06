<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use App\Models\Cinema;
use App\Models\Loisir;
use App\Models\Annonce;
use App\Models\Lecture;
use App\Models\Matiere;
use App\Models\Vouloir;
use App\Models\Livreapi;
use App\Models\Typejeux;
use App\Models\Concerner;
use App\Models\Competence;
use App\Models\Interesser;
use App\Models\Covoiturage;
use App\Models\Typeannonce;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Typeevenement;
use App\Models\EvenementSportif;
use App\Models\Ville;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AnnonceController extends Controller
{
    public function getAllAnnonce()
    {
        $annonces = Annonce::all();
        return view('dashboard', ['annonces' => $annonces]);
    }

    public function create(Request $request, ApiController $apiController)
    {
        $data = $request->only(['evenement']);
        $types = Typeannonce::all();
        $sport = Sport::all();
        $matieres = Matiere::all();
        $typejeux = Typejeux::all();
        if ($request->only(['evenement'])) {
            return view('annonces.create', [
                'types' => $types, 'sports' => $sport, 'typejeux' => $typejeux, 'matieres' => $matieres, 'evenement' => $data['evenement']
            ]);
        }
        return view('annonces.create', [
            'types' => $types, 'sports' => $sport, 'matieres' => $matieres, 'evenement' => 0
        ]);
    }

    public function store(Request $request)
    {
        // On récupère les données du formulaire
        $dataAnnonce = $request->only(['titreA', 'nbPersMax', 'descrA', 'idT', 'date']);
        // Créateur de l'article (auteur)
        $dataAnnonce['idU'] = Auth::user()->idU;

        if ($dataAnnonce['titreA'] == null || $dataAnnonce['descrA'] == null || $dataAnnonce['idT'] == 0 || $dataAnnonce['nbPersMax'] == null || $dataAnnonce['date'] == null) {
            return redirect()->back()->with('error', 'Veuillez remplir tous les champs !');
        }

        $image = $request->file('image');

        if ($image) {
            $imageName = $image->getClientOriginalName();
            Storage::disk('public')->put('img/' . $imageName, file_get_contents($image));
            $dataAnnonce['image'] = $imageName;
        } else {
            $dataAnnonce['image'] = '';
        }
        
        if ($request['evenement'] == '1') {
            $dataEvenement = $request->only(['adresse', 'idS', 'GPS']);
            if ($dataEvenement['idS'] == 0 || $dataEvenement['adresse'] == null || $dataEvenement['GPS'] == null) {
                return redirect()->back()->with('error', 'Veuillez remplir tous les champs !');
            }

            Annonce::create($dataAnnonce);
            $dataEvenement['idA'] = Annonce::where('idU', Auth::user()->idU)
                ->where('titreA', $dataAnnonce['titreA'])
                ->where('descrA', $dataAnnonce['descrA'])
                ->where('idT', $dataAnnonce['idT'])
                ->value('idA');
            EvenementSportif::create($dataEvenement);
        } elseif ($request['evenement'] == '2') {
            $dataEvenement = $request->only(['montantAjouter', 'LieuPerso', 'imdbIdFilm', 'GPS', 'adresse']);
            if ($dataEvenement['montantAjouter'] == null || $dataEvenement['LieuPerso'] == null || $dataEvenement['imdbIdFilm'] == null || $dataEvenement['GPS'] == null || $dataEvenement['adresse'] == null) {
                return redirect()->back()->with('error', 'Veuillez remplir tous les champs !');
            }
            Annonce::create($dataAnnonce);
            $dataEvenement['idA'] = Annonce::where('idU', Auth::user()->idU)
                ->where('titreA', $dataAnnonce['titreA'])
                ->where('descrA', $dataAnnonce['descrA'])
                ->where('idT', $dataAnnonce['idT'])
                ->value('idA');
            Cinema::create($dataEvenement);
        } elseif ($request['evenement'] == '3') {
            $dataEvenement = $request->only(['voiturePersonnel', 'GPS', 'adresse']);
            if ($dataEvenement['voiturePersonnel'] == null || $dataEvenement['GPS'] == null || $dataEvenement['adresse'] == null) {
                return redirect()->back()->with('error', 'Veuillez remplir tous les champs !');
            }
            Annonce::create($dataAnnonce);
            $dataEvenement['idA'] = Annonce::where('idU', Auth::user()->idU)
                ->where('titreA', $dataAnnonce['titreA'])
                ->where('descrA', $dataAnnonce['descrA'])
                ->where('idT', $dataAnnonce['idT'])
                ->value('idA');
            Covoiturage::create($dataEvenement);
        } elseif ($request['evenement'] == '4') {
            $dataEvenement = $request->only(['idJeuxSociete', 'idJeuxVideo', 'idTypeJeu']);
            if (($dataEvenement['idJeuxSociete'] == 0 && $dataEvenement['idJeuxVideo'] == 0) || $dataEvenement['idTypeJeu'] == 0) {
                return redirect()->back()->with('error', 'Veuillez remplir tous les champs !');
            }
            Annonce::create($dataAnnonce);
            $dataEvenement['idA'] = Annonce::where('idU', Auth::user()->idU)
                ->where('titreA', $dataAnnonce['titreA'])
                ->where('descrA', $dataAnnonce['descrA'])
                ->where('idT', $dataAnnonce['idT'])
                ->value('idA');
            if ($dataEvenement['idTypeJeu'] == 1) {
                Loisir::create(['idA' => $dataEvenement['idA'], 'idJeux' => $dataEvenement['idJeuxSociete'], 'idTypeJeu' => $dataEvenement['idTypeJeu']]);
            } elseif ($dataEvenement['idTypeJeu'] == 2) {
                Loisir::create(['idA' => $dataEvenement['idA'], 'idJeux' => $dataEvenement['idJeuxVideo'], 'idTypeJeu' => $dataEvenement['idTypeJeu']]);
            }
        } elseif ($request['evenement'] == '5') {
            $dataEvenement = $request->only(['idM']);
            if ($dataEvenement['idM'] == 0) {
                return redirect()->back()->with('error', 'Veuillez remplir tous les champs !');
            }
            Annonce::create($dataAnnonce);
            $dataEvenement['idA'] = Annonce::where('idU', Auth::user()->idU)
                ->where('titreA', $dataAnnonce['titreA'])
                ->where('descrA', $dataAnnonce['descrA'])
                ->where('idT', $dataAnnonce['idT'])
                ->value('idA');
            Competence::create(['idA' => $dataEvenement['idA']]);
            Concerner::create($dataEvenement);
        } elseif ($request['evenement'] == '6') {
            $dataEvenement = $request->only(['idGoogleBooks']);
            if ($dataEvenement['idGoogleBooks'] == 0) {
                return redirect()->back()->with('error', 'Veuillez remplir tous les champs !');
            }
            Annonce::create($dataAnnonce);
            $dataEvenement['idA'] = Annonce::where('idU', Auth::user()->idU)
                ->where('titreA', $dataAnnonce['titreA'])
                ->where('descrA', $dataAnnonce['descrA'])
                ->where('idT', $dataAnnonce['idT'])
                ->value('idA');
            $livreapi = Livreapi::where('idGoogleBooks', $dataEvenement['idGoogleBooks'])->first();
            if ($livreapi) {
                Lecture::create(['idA' => $dataEvenement['idA']]);
                Vouloir::create($dataEvenement);
            } else {
                Livreapi::create(['idGoogleBooks' => $dataEvenement['idGoogleBooks']]);
                Lecture::create(['idA' => $dataEvenement['idA']]);
                Vouloir::create($dataEvenement);
            }
        }
        return redirect()->route('dashboard')->with('success', 'Annonce créée avec succès !');
    }


    public function index()
    {
        // On récupère l'utilisateur connecté.
        $user = Auth::user();

        $annonces = Annonce::where('idU', $user->idU)->get();
        // On retourne la vue.
        return view('annonces.listMyArticle', [
            'annonces' => $annonces
        ]);
    }

    public function edit(Annonce $annonce)
    {
        // On vérifie que l'utilisateur est bien le créateur de l'annonce
        if ($annonce->idU !== Auth::user()->idU) {
            return redirect()->route('dashboard')->with('error', 'Vous ne pouvez pas modifier cet annonce !');
        }

        // On retourne la vue avec l'annonce
        return view('annonces.edit', [
            'annonce' => $annonce
        ]);
    }

    public function remove(Annonce $annonce)
    {
        if ($annonce->idU !== Auth::user()->idU) {
            return redirect()->route('dashboard')->with('error', 'Vous ne pouvez pas supprimer cet annonce !');
        }

        $annonce->delete();

        return redirect()->route('dashboard')->with('success', 'Annonce supprimé !');
    }

    public function participerAnnonce(Annonce $annonce)
    {
        $user = Auth::user()->idU;
        if ($user == $annonce->idU) {
            return redirect()->route('dashboard')->with('error', 'Vous ne pouvez pas participer à votre propre annonce !');
        }
        Interesser::create(['idAnnonce' => $annonce->idA, 'idEtudiant' => $user]);
        return redirect()->route('dashboard')->with('success', 'Vous participez à cette annonce !');
    }

    public function desinscrireAnnonce(Annonce $annonce)
    {
        $user = Auth::user()->idU;
        if ($user == $annonce->idU) {
            return redirect()->route('dashboard')->with('error', 'Vous ne pouvez pas desinscrire de votre propre annonce !');
        }
        Interesser::where('idEtudiant', $user)->where('idAnnonce', $annonce->idA)->delete();
        return redirect()->route('dashboard')->with('success', 'Vous avez desinscrit de cette annonce !');
    }

    public function nbPlaceRestante(Annonce $annonce)
    {
        $idAnnonce = $annonce->idA;
        $nbPlaceRestante = $annonce->nbPersMax - Interesser::where('idAnnonce', $idAnnonce)->count();
        return $nbPlaceRestante;
    }

    public function inscription()
    {
        $user = Auth::user()->idU;
        $idAnnonces = Interesser::where('idEtudiant', $user)->pluck('idAnnonce');
        $annonces = Annonce::whereIn('idA', $idAnnonces)->get();
        return view('annonces.inscription', [
            'annonces' => $annonces
        ]);
    }
}
