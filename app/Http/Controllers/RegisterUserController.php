<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    public function formRegister()
    {
        return view('components.auth.register_form');
    }

    public function register(Request $req)
    {
        $req->validate([
            'login' => 'required|string|max:10|unique:users',
            'nom' => 'required|string|max:40',
            'prenom' => 'required|string|max:40',
            'mdp' => 'required|string|min:4|confirmed',
        ]);

        $user = new User();
        $user->login = $req->login;
        $user->nom = $req->nom;
        $user->prenom = $req->prenom;
        $user->mdp = Hash::make($req->mdp);
        $user->save();

        return redirect()->route('login')->with('success', 'Compte créé avec succès !')->withInput($req->only('login'));
    }
}
