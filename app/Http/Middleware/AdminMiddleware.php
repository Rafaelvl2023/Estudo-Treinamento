<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // Handle é um método para representar a função que "manipula" ou processa algo.
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->role != 'admin') {
            return redirect('/home')->with('error', 'Acesso não autorizado');
        }
        return $next($request);
    }

}
