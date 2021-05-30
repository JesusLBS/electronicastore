<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MDadmin 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $usuario_actual=\Auth::user();
        if ($usuario_actual->id_rol==2) {
            return redirect()->intended('/');
            //abort(401,'This Acton is unauthorized');
        }
        return $next($request);
    }
}
   