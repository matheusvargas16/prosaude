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
        // Valida os dados enviados no formulário
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
        ]);

        // Busca o ticket pelo ID e atualiza os campos
        $suporte = Suporte::findOrFail($id);
        $suporte->update($validated);

        // Redireciona de volta para a lista de tickets com uma mensagem de sucesso
        return redirect()->route('suporte.index')->with('status', 'Ticket atualizado com sucesso!');
    }



    public function destroy($id)
    {
        // Busca o ticket pelo ID e o exclui
        $suporte = Suporte::findOrFail($id);
        $suporte->delete();

        // Redireciona de volta para a lista de tickets com uma mensagem de sucesso
        return redirect()->route('suporte.index')->with('status', 'Ticket excluído com sucesso!');
    }

}
