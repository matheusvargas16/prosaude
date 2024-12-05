<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plano;
use Illuminate\Http\Request;

class PlanosController extends Controller
{
    // Exibe a lista de planos
    // App\Http\Controllers\Admin\PlanoController.php

    public function index()
    {
        $planos = Plano::paginate(10);  // Paginação dos planos
        return view('admin.planos.index', compact('planos'));
    }


    // Exibe o formulário para criar um novo plano
    public function create()
    {
        return view('admin.planos.create');
    }

    // Cria um novo plano
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string',
            'tipo' => 'required|string',
            'cobertura' => 'required|string', // Mantém como texto
            'faixaetaria' => 'required|string',
            'preco' => 'required|numeric',
        ]);

        Plano::create($validated);

        // Criar o plano
        Plano::create($request->all());

        // Adicionar mensagem de sucesso na sessão
        session()->flash('success', 'Plano criado com sucesso!');

        return redirect()->route('admin.planos.index')->with('success', 'Plano criado com sucesso!');
    }


    // Exibe o formulário para editar um plano
    public function edit(Plano $plano)
    {
        return view('admin.planos.edit', compact('plano'));
    }

    // Atualiza os dados de um plano
    public function update(Request $request, $id)
    {       
        // Substituir a vírgula por um ponto no campo 'preco'
        $request->merge([
            'preco' => str_replace(',', '.', $request->input('preco')),
        ]);

        // Validação
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'tipo' => 'required|string',
            'cobertura' => 'required|string',
            'faixaetaria' => 'required|string',
            'preco' => 'required|numeric', // Agora aceita o valor convertido
        ]);

        // Atualizar o plano
        $plano = Plano::findOrFail($id);
        $plano->update($validatedData);

         // Atualizar o plano
        $plano->update($request->all());

        // Adicionar mensagem de sucesso na sessão
        session()->flash('success', 'Plano atualizado com sucesso!');

        return redirect()->route('admin.planos.index')->with('success', 'Plano atualizado com sucesso!');
    }


    // Deleta um plano
    public function destroy(Plano $plano)
    {
        $plano->delete();
        return redirect()->route('admin.planos.index')->with('success', 'Plano deletado com sucesso!');
    }
}
