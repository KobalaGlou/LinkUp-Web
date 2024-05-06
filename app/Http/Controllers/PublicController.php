<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Loisir;
use App\Models\Annonce;
use App\Models\Lecture;
use App\Models\Vouloir;
use App\Models\Concerner;
use App\Models\Competence;
use App\Models\Interesser;
use App\Models\Covoiturage;
use Illuminate\Http\Request;
use App\Models\EvenementSportif;

class PublicController extends Controller
{
    function Annonce(Annonce $annonce)
    {
        $sport = EvenementSportif::all()->where("idA", $annonce->idA)->first();
        $lecture = Vouloir::all()->where("idA", $annonce->idA)->first();
        $covoiturage = Covoiturage::all()->where("idA", $annonce->idA)->first();
        $concerner = Concerner::all()->where("idA", $annonce->idA)->first();
        $loisir = Loisir::all()->where("idA", $annonce->idA)->first();
        $cinema = Cinema::all()->where("idA", $annonce->idA)->first();
        $interesser = Interesser::all()->where("idAnnonce", $annonce->idA);
        if ($sport) {
            return view('public.annonce', ['annonce' => $annonce, 'evenement' => 1, 'sport' => $sport, 'interesser' => $interesser]);
        } else if ($lecture) {
            $apiController = new \App\Http\Controllers\ApiController();
            $response = $apiController->apiBookById(new Request(['idGoogleBooks' => $lecture->idGoogleBooks]));
            $livreContent = json_decode($response->getContent(), true);
            $livre = $livreContent['results'] ?? null;
            return view('public.annonce', ['annonce' => $annonce, 'evenement' => 6, 'livre' => $livre , 'interesser' => $interesser]);
        } else if ($covoiturage) {
            return view('public.annonce', ['annonce' => $annonce, 'evenement' => 3, 'covoiturage' => $covoiturage, 'interesser' => $interesser]);
        } else if ($concerner) {
            return view('public.annonce', ['annonce' => $annonce, 'evenement' => 5, 'concerner' => $concerner, 'interesser' => $interesser]);
        } else if ($loisir) {
            if ($loisir->idTypeJeu == 1) {
                $apiController = new \App\Http\Controllers\ApiController();
                $response = $apiController->apiJeuxSocieteById(new Request(['id' => $loisir->idJeux]));
                $jeuxContent = json_decode($response->getContent(), true);
                $jeuxSociete = $jeuxContent['results'][0] ?? null;
                return view('public.annonce', ['annonce' => $annonce, 'evenement' => 4, 'jeuxSociete' => $jeuxSociete, 'interesser' => $interesser]);
            } else if ($loisir->idTypeJeu == 2) {
                $apiController = new \App\Http\Controllers\ApiController();
                $response = $apiController->apiJeuxVideoById(new Request(['id' => $loisir->idJeux]));
                $jeuxContent = json_decode($response->getContent(), true);
                return view('public.annonce', ['annonce' => $annonce, 'evenement' => 7, 'jeuxVideo' => $jeuxContent, 'interesser' => $interesser]);
            }
        } else if ($cinema) {
            $apiController = new \App\Http\Controllers\ApiController();
            $response = $apiController->apiFilmById(new Request(['id' => $cinema->imdbIdFilm]));
            $film = json_decode($response->getContent(), true);
            return view('public.annonce', ['annonce' => $annonce, 'evenement' => 2, 'film' => $film, 'interesser' => $interesser]);
        }
        return view('public.annonce', ['annonce' => $annonce]);
    }
}
