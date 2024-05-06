<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Utilisateur;
use App\Utils\EmailUtils;

class UserController extends Controller
{
    public function premiereConnexion()
    {
        return view('auth.reset-password-first-connexion');
    }
}
