<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UsuarioAdmin
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
        if(session()->get("usuario")){
            return $next($request);
        }else{
            toastr()->error("Você não pode acessar essa página !");
            return redirect()->route("painel.login");
        }
        return $next($request);
    }
}
