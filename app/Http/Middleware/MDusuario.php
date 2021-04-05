<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MDusuario
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
         /*
         $usuario_actual=\Auth::user();
        if ($usuario_actual->id_rol!=1) {
            return redirect('');
        }
        return $next($request);
*/
         
    }
}
