<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plano;
use App\Models\Compra;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    // Exibe os planos disponíveis para compra
    public function index()
    {
        $planos = Plano::all();
        return view('comprar.index', compact('planos'));
    }

    // Realiza a compra de um plano
    public function store($plano_id)
    {
        $plano = Plano::findOrFail($plano_id); // Busca o plano selecionado
        $compra = new Compra();
        $compra->user_id = Auth::id(); // Associa o usuário logado à compra
        $compra->plano_id = $plano->id;
        $compra->status = 'pendente'; // O status pode ser alterado conforme o processo
        $compra->save(); // Salva a compra no banco de dados

        // Redireciona o usuário após a compra
        return redirect()->route('dashboard')->with('success', 'Compra realizada com sucesso!');
    }
}
