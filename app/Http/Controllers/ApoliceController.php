<?php

namespace App\Http\Controllers;

use App\Models\Apolice;
use App\Models\Plano;
use Illuminate\Http\Request;

class ApoliceController extends Controller
{

    
    public function index()
    {
        $apolices = Apolice::all(); // Aqui você pode adicionar filtros, se necessário
        return view('apolices.index', compact('apolices'));
    }

    public function create()
    {
        $planos = Plano::all(); // Você vai passar todos os planos disponíveis para associar à apólice
        return view('apolices.create', compact('planos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'plano_id' => 'required|exists:planos,id',
            'status' => 'required|string',
            'preco' => 'required|numeric',
            'descricao' => 'nullable|string',
            'alteracao' => 'nullable|string',
            'datainicio' => 'required|date',
            'datafim' => 'required|date',
        ]);

        Apolice::create($request->all()); // Cria a apólice no banco
        return redirect()->route('apolices.index');
    }

    public function show($id)
    {
        $apolice = Apolice::findOrFail($id);
        return view('apolices.show', compact('apolice'));
    }

    public function edit($id)
    {
        $apolice = Apolice::findOrFail($id);
        $planos = Plano::all();
        return view('apolices.edit', compact('apolice', 'planos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'plano_id' => 'required|exists:planos,id',
            'status' => 'required|string',
            'valor' => 'required|numeric',
            'descricao' => 'nullable|string',
            'alteracao' => 'nullable|string',
            'datainicio' => 'required|date',
            'datafim' => 'required|date',
        ]);

        $apolice = Apolice::findOrFail($id);
        $apolice->update($request->all()); // Atualiza a apólice
        return redirect()->route('apolices.index');
    }

    public function destroy($id)
    {
        $apolice = Apolice::findOrFail($id);
        $apolice->delete(); // Deleta a apólice
        return redirect()->route('apolices.index');
    }
}
