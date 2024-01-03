<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    // /**
    //  * user Renvoie l'utilisateur qui à passer la commande.
    //  *
    //  * @return void
    //  */
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public static function getNext()
    {
        return static::max('id') + 0;
    }
}
