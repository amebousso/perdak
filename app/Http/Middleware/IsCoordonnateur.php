<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;

class IsCoordonnateur
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if (session('statut') === 'coordo' || session('statut') === 'coordoPole' || session('statut') === 'admin' || session('statut') === 'superAdmin') {
        return $next($request);
      }

      return redirect()->back()->with('warning', "Vous n'êtes autorisé à accéder à cette page.");
    }
}
