<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Apolice;
use App\Models\Plano;
use App\Models\Suporte;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        // Estatísticas gerais
        $usuarios = User::all();
        $apolices = Apolice::all();
        
        // Estatísticas específicas
        $totalUsuarios = $usuarios->count();
        $totalApolices = $apolices->count();
        $receitaTotal = $apolices->sum('preco');
        
        // Estatísticas de apólices ativas vs canceladas
        $apolicesAtivas = $apolices->where('status', 'ativa')->count();
        $apolicesCanceladas = $apolices->where('status', 'cancelada')->count();

        $ultimasApolices = Apolice::where('status', 'ativa') // Ou o valor correspondente para 'ativa'
        ->with('user', 'plano') // Eager loading para evitar N+1 queries
        ->latest()
        ->take(5)
        ->get();
        
        $ultimosUsuarios = User::latest()->take(5)->get();
        
        // Estatísticas de novos usuários e apólices no último mês
        $novosUsuarios = User::where('created_at', '>=', Carbon::now()->subMonth())->count();
        $novasApolices = Apolice::where('created_at', '>=', Carbon::now()->subMonth())->count();
        
        // Estatísticas para passar para a view
        $estatisticas = [
            'totalUsuarios' => User::count(),
            'totalApolices' => Apolice::count(),
            'totalPlanos' => Plano::count(),
            'apolicesAtivas' => Apolice::where('status', 'ativa')->count(),
            'apolicesCanceladas' => Apolice::where('status', 'cancelada')->count(),
            'novosUsuarios' => User::where('created_at', '>=', now()->subMonth())->count(),
            'novasApolices' => Apolice::where('created_at', '>=', now()->subMonth())->count(),
        ];
    
        return view('admin.dashboard', compact('estatisticas', 'ultimasApolices', 'ultimosUsuarios'));
    }

    
    // AdminController.php
    public function usuarios()
    {
        $usuario = User::paginate(10); // Paginação de 10 usuários por página
        return view('admin.usuarios', compact('usuarios'));
    }

    // AdminController.php
    public function planos()
    {
        $planos = Plano::paginate(10); // Paginação de 10 planos por página
        return view('admin.planos', compact('planos'));
    }


    // AdminController.php
    public function suporte()
    {
        $tickets = Ticket::paginate(10); // Paginação de 10 tickets por página
        return view('admin.suporte', compact('tickets'));
    }

}
