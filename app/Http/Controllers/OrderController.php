<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * addItems Stock les pizzas ajoutées dans la session dans un tableau.
     *
     * @param Request req requête de formulaire
     *
     * @return void
     */
    public function addToCart($id)
    {
        $pizza = Pizza::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            ++$cart[$id]['quantity'];
        } else {
            $cart[$id] = [
                'id' => $pizza->id,
                'name' => $pizza->nom,
                'price' => $pizza->prix,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);
        session()->flash('ok', 'Ajouté au panier.');

        return redirect()->back();
    }

    /**
     * editCart Permet de modifier la quantité d'un élément du panier, supprime l'élément si la quantitée < 0.
     *
     * @param mixed id ID de la pizza
     *
     * @return void
     */
    public function editCart($id)
    {
        $cart = session()->get('cart', []);

        if ($cart[$id]['quantity'] > 1) {
            --$cart[$id]['quantity'];
        } else {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (sizeof($cart) > 0) {
            $commande = new Commande();
            $commande->user_id = Auth::id();
            $commande->statut = 'envoye';
            $commande->save();

            foreach ($cart as $item) {
                DB::insert('insert into commande_pizza (commande_id, pizza_id, qte) values (?, ?, ?)', [$commande->id, $item['id'], $item['quantity']]);
            }

            session()->put('cart', []);
            session()->flash('ok', 'Commande validée, elle sera traitée prochainement');

            return redirect()->back();
        } else {
            session()->flash('error', 'Panier vide');

            return redirect()->back();
        }
    }
}
