<?php

namespace App\Http\Controllers;

use App\Models\Suporte;
use Illuminate\Http\Request;

class SuporteController extends Controller
{
    public function index()
    {
        // Buscar todos os tickets do usuário logado
        $suportes = Suporte::where('user_id', auth()->id())->get();

        // Retornar a view com os tickets
        return view('suporte.index', compact('suportes'));
    }

    public function show($id)
    {
        // Busca o ticket pelo ID (com a coluna 'id')
        $suporte = Suporte::findOrFail($id);

        // Retorna a view com os detalhes do ticket
        return view('suporte.show', compact('suporte'));
    }




    public function create()
    {
        return view('suporte.criar'); // Apenas retorna a view do formulário
    }

    public function store(Request $request)
    {
        // Validação do formulário
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string|max:500',
        ]);

        // Cria o novo ticket
        $suporte = new Suporte();
        $suporte->titulo = $request->input('titulo');
        $suporte->descricao = $request->input('descricao');
        $suporte->status = 'Aberto'; // Definindo o status inicial
        $suporte->user_id = auth()->id(); // Associando ao usuário logado
        $suporte->save(); // Salva no banco de dados

        // Redireciona com uma mensagem de sucesso
        return redirect()->route('suporte.index')->with('status', 'Ticket criado com sucesso!');
    }


    public function edit($id)
    {
        $suporte = Suporte::findOrFail($id);
        return view('suporte.edit', compact('suporte'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string',
            'descricao' => 'required|string',
        ]);

        $suporte = Suporte::findOrFail($id);
        $suporte->update($request->all());
        return redirect()->route('suporte.index');
    }

    public function destroy($id)
    {
        $suporte = Suporte::findOrFail($id);
        $suporte->delete();
        return redirect()->route('suporte.index');
    }
}
