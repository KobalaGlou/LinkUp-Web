<?php

use App\Models\User;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\ModerationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $pastAnnonces = App\Models\Annonce::where('date', '>', now())->get();
    $user = Auth::user();
    if ($user) {
        $utilisateur = Utilisateur::find(Auth::user()->idU);
        if ($utilisateur->premiereCo) {
            $utilisateur->premiereCo = 0;
            $utilisateur->save();
            return view('welcome', [
                'urlAPI' => url('/'),
                'types' => App\Models\Typeannonce::all(),
                'annonces' => $pastAnnonces,
                'success' => 'Un mail vous a été envoyé pour changer de mot de passe'
            ]);
        }
    }
    return view('welcome', [
        'urlAPI' => url('/'),
        'types' => App\Models\Typeannonce::all(),
        'annonces' => $pastAnnonces
    ]);
})->name('dashboard');

Route::get('/dashboard', function () {
    $pastAnnonces = App\Models\Annonce::where('date', '>', now())->get();
    $user = Auth::user();
    if ($user) {
        $utilisateur = Utilisateur::find(Auth::user()->idU);
        if ($utilisateur->premiereCo) {
            $utilisateur->premiereCo = 0;
            $utilisateur->save();
            return view('dashboard', [
                'urlAPI' => url('/'),
                'types' => App\Models\Typeannonce::all(),
                'annonces' => $pastAnnonces,
                'success' => 'Un mail vous a été envoyé pour changer de mot de passe'
            ]);
        }
    }
    return view('dashboard', [
        'urlAPI' => url('/'),
        'types' => App\Models\Typeannonce::all(),
        'annonces' => $pastAnnonces
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/annonce/create', [AnnonceController::class, 'create'])->name('annonce.create');
    Route::post('/annonce/store', [AnnonceController::class, 'store'])->name('annonce.store');
    Route::get('/annonce/list', [AnnonceController::class, 'index'])->name('annonce.list');
    Route::get('/annonces/inscription', [AnnonceController::class, 'inscription'])->name('annonce.inscritptionAnnonces');
    Route::get('/annonce/{annonce}/edit', [AnnonceController::class, 'edit'])->name('annonce.edit');
    Route::get('/annonce/{annonce}/remove', [AnnonceController::class, 'remove'])->name('annonce.remove');
    Route::get('/moderation/allAnnonces', [ModerationController::class, 'getAllAnnonces'])->name('moderation.allAnnonces');
    Route::get('/moderation/reportAnnonce/{annonce}', [ModerationController::class, 'getAnnonce'])->name('moderation.reportAnnonce');
    Route::get('/moderation/reportUser/{etudiant}', [ModerationController::class, 'getEtudiant'])->name('moderation.reportUser');
    Route::post('/moderation/store', [ModerationController::class, 'store'])->name('report.store');
    Route::get('/searchAnnonce', [ManagementController::class, 'searchAnnonce'])->name('searchAnnonce');
    Route::get('/participerAnnonce/{annonce}', [AnnonceController::class, 'participerAnnonce'])->name('annonce.participer');
    Route::get('/desinscrireAnnonce/{annonce}', [AnnonceController::class, 'desinscrireAnnonce'])->name('annonce.desinscrire');
    Route::get('/annonce/{annonce}', [PublicController::class, 'annonce'])->name('public.annonce');
    Route::get('/addCoins', [ProfileController::class, 'addCoins'])->name('profile.addCoins');
    Route::post('/addCoins', [ProfileController::class, 'storeCoins'])->name('profile.storeCoins');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.updateProfile');
    Route::post('/profile/updatePassword', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::get('/user/premiereConnexion', [UserController::class, 'premiereConnexion'])->name('user.premiereConnexion');
});

require __DIR__ . '/auth.php';
