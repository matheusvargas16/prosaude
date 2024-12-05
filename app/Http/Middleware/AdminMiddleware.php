<?php
// app/Http/Middleware/AdminMiddleware.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica se o usuário está autenticado e tem a role 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // Se for admin, permite o acesso
        }

        // Caso contrário, redireciona para a página inicial ou qualquer outra página
        return redirect('/')->with('error', 'Acesso restrito. Somente administradores podem acessar.');
    }
}

