<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $req, Closure $next)
    {
        if ($req->user()->isAdmin()) {
            return $next($req);
        }

        abort(403, 'You are not admin');
    }
}
