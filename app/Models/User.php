<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticable;

class User extends Authenticable
{
    public $timestamps = false;

    protected $hidden = ['mdp'];
    protected $fillable = ['login', 'mdp', 'nom'];
    protected $attributes = ['type' => 'user'];

    public function orders()
    {
        return $this->hasMany(Commande::class);
    }

    public function getAuthPassword()
    {
        return $this->mdp;
    }

    public function isAdmin()
    {
        return $this->type == 'admin';
    }

    public function isUser()
    {
        return $this->type == 'user';
    }

    public function isCook()
    {
        return $this->type == 'cook';
    }
}
