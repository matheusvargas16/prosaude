<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Suporte;
use Illuminate\Http\Request;

class SuporteAdminController extends Controller
{
    // Exibe a lista de suportes
    // Exibe a lista de suportes
    public function index()
    {
        $suportes = Suporte::paginate(10); // Paginação de 10 suportes por página
        return view('admin.suporte.index', compact('suportes'));
    }


    // Exibe os detalhes de um suporte
    // Exibe os detalhes de um ticket de suporte
    public function show($id)
    {
        // Recupera o suporte com base no ID
        $suporte = Suporte::findOrFail($id);
        return view('admin.suporte.show', compact('suporte'));
    }
    // Atualiza o status de um suporte
    public function update(Request $request, $id)
    {
        $suporte = Suporte::findOrFail($id); // Encontra o suporte pelo ID

        // Validação do status
        $request->validate([
            'status' => 'required|string|in:aberto,em andamento,fechado',
        ]);

        // Atualiza o status do suporte
        $suporte->update([
            'status' => $request->status,
        ]);

        // Redireciona com sucesso
        return redirect()->route('admin.suporte.index')->with('success', 'Status do suporte atualizado com sucesso!');
    }


    // Deleta um suporte
    public function destroy(Suporte $suporte)
    {
        $suporte->delete();
        return redirect()->route('admin.suporte.index')->with('success', 'Suporte deletado com sucesso!');
    }

    // Resolve um suporte
    public function resolvePage(Suporte $suporte)
    {
        // Exibe o formulário de resolução
        return view('admin.suporte.resolve', compact('suporte'));
    }

    // Processa a resolução do ticket
    public function resolve(Request $request, $id)
    {
        // Encontrar o ticket de suporte pelo ID
        $suporte = Suporte::findOrFail($id);

        // Validar a descrição da resolução
        $request->validate([
            'resolucao' => 'required|string|max:1000', // Ajuste a validação conforme necessário
        ]);

        // Atualizar o campo 'resolucao' com o valor enviado no formulário
        $suporte->resolucao = $request->input('resolucao');
        $suporte->status = 'Fechado';  // Aqui você pode definir o status para fechado, caso seja o comportamento desejado
        $suporte->save(); // Salvar as alterações no banco de dados

        // Redirecionar o usuário com uma mensagem de sucesso
        return redirect()->route('admin.suporte.index')->with('success', 'Ticket resolvido com sucesso!');
    }

}
