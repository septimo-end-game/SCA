<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

use Closure;
//declaracion de reglas de libre navegacion solo para Administradores
//Middleware dado de alta en Kernel.php 
class AdminMiddleware
{

    public function handle($request, Closure $next)
    {
        if (auth()->user()->rol == 'Administrador')
            return $next($request);
        

        return redirect('empleados');
        
    }
}
