<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticateUserController extends Controller
{
    public function formLogin()
    {
        return view('components.auth.login_form');
    }

    public function login(Request $req)
    {
        $req->validate([
            'login' => 'required|string',
            'mdp' => 'required|string',
        ]);

        $credentials = [
            'login' => $req->input('login'),
            'password' => $req->input('mdp'),
        ];

        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();

            if ($req->user()->isAdmin()) {
                return redirect()->intended('panel/admin/home');
            } elseif ($req->user()->isUser()) {
                return redirect()->intended('panel/user/home');
            } elseif ($req->user()->isCook()) {
                return redirect()->intended('panel/cook/home');
            }
        }

        return back()->withErrors([
            'login' => 'Identifiant ou mot de passe invalide.',
        ])->withInput();
    }

    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect('/');
    }

    public function resetPassword(Request $req)
    {
        $validated = $req->validate([
            'id' => 'required|integer',
            'mdp' => 'required|string|min:4|confirmed',
        ]);

        $edit = User::find($validated['id']);
        $edit->mdp = Hash::make($validated['mdp']);
        $edit->save();

        $req->session()->flash('ok', 'Mdp modifié avec succès');

        return redirect()->back();
    }
}
