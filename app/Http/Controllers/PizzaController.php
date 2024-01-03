<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function add(Request $req)
    {
        $validated = $req->validate([
            'nom' => 'required|string|max:30',
            'description' => 'required|string',
            'prix' => 'required|numeric',
        ]);

        $pizza = new Pizza();
        $pizza->nom = $validated['nom'];
        $pizza->description = $validated['description'];
        $pizza->prix = $validated['prix'];
        $pizza->save();

        $req->session()->flash('ok', 'Ajout effectué.');

        return redirect()->back();
    }

    public function remove(Request $req)
    {
        $validated = $req->validate([
            'id' => 'required|integer',
        ]);

        $pizza = Pizza::find($validated['id']);
        $pizza->delete();

        $req->session()->flash('ok', 'Pizza supprimée.');

        return redirect()->back();
    }

    public function edit(Request $req)
    {
        $validated = $req->validate([
            'id' => 'required|integer',
            'nom' => 'nullable|string|max:30',
            'description' => 'nullable|string',
            'prix' => 'nullable|numeric',
        ]);

        $edit = Pizza::find($validated['id']);

        $toBeSaved = false;

        foreach ($validated as $key => $value) {
            if ($key != 'id' && $value != null) {
                $edit->$key = $value;
                $toBeSaved = true;
            }
        }

        if ($toBeSaved) {
            $edit->save();
            $req->session()->flash('ok', 'Pizza modifiée avec succès');
        } else {
            $req->session()->flash('warn', 'Aucune modification effectuée.');
        }

        return redirect()->back();
    }
}
