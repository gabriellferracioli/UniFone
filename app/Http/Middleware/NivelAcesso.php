<?php

namespace App\Http\Middleware;

use Closure;

class NivelAcesso
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$nivel)
    {
        // return $next($request);
        if ($nivel == 'cliente'){
            if(Auth()->user()->Cargo_Usuario == 'Atendente'){
                return redirect()->route('home');
            }           
        }else if($nivel == 'usuario'){
            if((Auth()->user()->Cargo_Usuario == 'Atendente') or (Auth()->user()->Cargo_Usuario == 'Supervisor')) {
                return redirect()->route('home');
            }     
        }
        return $next($request);

    }
}
