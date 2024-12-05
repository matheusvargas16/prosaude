<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Construtor para garantir que o usuário está autenticado antes de acessar a dashboard
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Método para redirecionar o usuário para a dashboard correta
     */
    public function index()
    {
        // Verifica a role do usuário autenticado
        if (Auth::user()->role === 'admin') {
            return view('admin.dashboard'); // Retorna a dashboard do admin
        }

        return view('user.dashboard'); // Retorna a dashboard do usuário comum
    }
}
