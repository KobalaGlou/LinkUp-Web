<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function addCoins()
    {
        return view('profile.add-coins');
    }

    public function storeCoins(Request $request)
    {
        $request->validate([
            'credit' => ['required', 'numeric']
        ]);
        $userCredit = Auth::user()->etudiant->nbCredit;
        $newCredit = $userCredit + $request->credit;
        Auth::user()->etudiant->update([
            'nbCredit' => $newCredit
        ]);
        return redirect()->back()->with('success', 'Credit ajoutés avec succès');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'nomU' => ['required', 'string', 'max:255'],
            'prenomU' => ['required', 'string', 'max:255'],
            'emailU' => ['required', 'string', 'email', 'max:255'],
        ]);
        $user['idU'] = Auth::user()->idU;
        $user['nomU'] = $request->nomU;
        $user['prenomU'] = $request->prenomU;
        $user['emailU'] = $request->emailU;
        Utilisateur::where('idU', $user['idU'])->update($user);

        return redirect()->back()->with('success', 'Profil mis a jour avec succès');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],
        ]);

        $user = Utilisateur::find(Auth::user()->idU);

        if (!Hash::check($request->current_password, $user->passwordU)) {
            return redirect()->back()->with('error', 'Mot de passe actuel incorrect');
        } elseif ($request->password != $request->password_confirmation) {
            return redirect()->back()->with('error', 'Les deux mots de passe ne sont pas identiques');
        } else {
            $user->passwordU = Hash::make($request->password);
            $user->save();
        }

        return redirect()->back()->with('success', 'Mot de passe mis à jour avec succès');
    }
}
