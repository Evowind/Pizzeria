<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Pizza;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function getUserCart()
    {
        return view('components.user.cart');
    }

    public function getUserPanel()
    {
        return view('components.user.content');
    }

    public function getAdminPanel()
    {
        return view('components.admin.content');
    }

    public function getPizzaPanel()
    {
        $pizzas = Pizza::all();

        return view('components.admin.pizzas', ['pizzas' => $pizzas]);
    }

    public function getUserSettings()
    {
        return view('components.user.settings');
    }

    public function getUserOrder()
    {
        $pizzas = Pizza::paginate(10);

        return view('components.user.order', ['pizzas' => $pizzas]);
    }

    public function getUserCommands()
    {
        $commands = Commande::where('user_id', Auth::id())->get();

        return view('components.user.commands', ['commands' => $commands]);
    }

    public function getCookPanel()
    {
        return view('components.cook.content');
    }

    public function getCookCommandes()
    {
        $commandes = Commande::where('statut', '!=', 'recupere')->orderBy('created_at', 'ASC')->get();

        $statuts = [
            'envoye' => 'envoye',
            'traitement' => 'traitement',
            'pret' => 'pret',
            'recupere' => 'recupere',
        ];

        return view('components.cook.commandes', ['commandes' => $commandes, 'statuts' => $statuts]);
    }

    /**
     * update Fonction de mise à jour des statuts pour le cuisinier.
     *
     * @param Request req Requete
     *
     * @return void
     */
    public function update(Request $req)
    {
        $validated = $req->validate([
            'statut.*' => 'required|string',
            'id.*' => 'required|int',
        ]);

        foreach ($validated['id'] as $id) {
            $commande = Commande::find($id);
            $commande->statut = $validated['statut'][$id];
            $commande->save();
        }

        session()->flash('ok', 'Mise à jour effectuée');

        return redirect()->back();
    }

    public function getAdminCommands()
    {
        $commandes = Commande::paginate(10);

        return view('components.admin.commandes', ['commandes' => $commandes, 'recette' => $this->getRecette()]);
    }

    /**
     * getRecette Permet de calculer la recette du jour.
     *
     * @return void
     */
    public function getRecette()
    {
        // Calcul de la recette du jour
        $commandesTot = Commande::where('created_at', '>=', Carbon::today())->get();
        $recette = 0;

        foreach ($commandesTot as $commande) {
            // Trouver toutes les pizzas associées à la commande
            $items = DB::select('select * from commande_pizza where commande_id = ?', [$commande->id]);
            // Trouver le prix via l'id de chaque pizza trouvée
            foreach ($items as $item) {
                $pizza = Pizza::where('id', $item->pizza_id)->first();

                if (isset($pizza)) {
                    $recette += $pizza->prix * $item->qte;
                }
            }
        }

        return $recette;
    }

    /**
     * filter Fonction de filtre de la selection via la date ou le statut.
     *
     * @param Request req Requete
     *
     * @return void
     */
    public function filter(Request $req)
    {
        $validated = $req->validate([
            'date' => 'nullable|string',
            'statut' => 'nullable|string',
        ]);

        if ($validated['statut'] != 'all') {
            $commandes = Commande::where('statut', $validated['statut'])->where('created_at', '>=', $validated['date'] . ' 00:00:00')->paginate(10);
        } else {
            $commandes = Commande::where('created_at', '>=', $validated['date'] . ' 00:00:00')->paginate(10);
        }

        return view('components.admin.commandes', ['commandes' => $commandes, 'recette' => $this->getRecette()]);
    }

    public function getAdminUsers()
    {
        $users = User::all();

        return view('components.admin.users', ['users' => $users]);
    }

    /**
     * getCommandDetails Permet d'obtenir les informations associées au numéro de commande.
     *
     * @param mixed id ID de la commande
     *
     * @return void
     */
    public function getCommandDetails($id)
    {
        $commande = Commande::where('id', (int)$id)->first();
        $items = DB::select('select * from commande_pizza where commande_id = ?', [$id]);
        $user = User::where('id', $commande->user_id)->first();

        $details = [];

        foreach ($items as $item) {
            $pizza = Pizza::where('id', $item->pizza_id)->withTrashed()->first();
            $details[$item->pizza_id] = $pizza;
        }

        return view(
            'components.user.order_detail',
            [
                'commande' => $commande,
                'items' => $items,
                'pizzas' => $details,
                'user' => $user,
            ]
        );
    }
}
