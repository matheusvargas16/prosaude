<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Apolice;
use App\Models\Plano;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PlanoController extends Controller
{
    // Método para exibir a página de compra com todos os planos
    public function showCompra()
    {
        $planos = Plano::all(); 
        return view('planos.comprar', compact('planos')); // Passa a variável 'planos' para a view
    }



    // Método para exibir detalhes do plano específico
    public function detalhes($id)
    {
        $plano = Plano::findOrFail($id); // Buscar o plano pelo ID
        return view('planos.detalhes', compact('plano')); // Retornar a view de detalhes
    }

    // Método para finalizar a compra (exibir tela de finalização)
    public function finalizarCompra($id)
    {
        // Buscar o plano pelo ID
        $plano = Plano::findOrFail($id);

        // Retornar a view de finalizar compra com o plano selecionado
        return view('planos.finalizar_compra', compact('plano'));
    }


    // Método para confirmar a compra do plano
    public function confirmarCompra(Request $request, $id)
    {
        // Recuperar o usuário logado
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->withErrors(['msg' => 'É necessário estar logado para concluir a compra.']);
        }

        // Buscar o plano pelo ID
        $plano = Plano::findOrFail($id);

        // Criar a nova apólice vinculada ao usuário e plano, incluindo o preço
        Apolice::create([
            'usuario_id' => $user->id, // A coluna correta é 'usuario_id'
            'plano_id' => $plano->id,
            'preco' => $plano->preco, // Preço da apólice igual ao preço do plano
            'status' => 'pendente',
            'datainicio' => now(),
            'datafim' => now()->addYear(),
        ]);

        return redirect()->route('profile.edit')->with('success', 'Compra concluída com sucesso! Seu plano foi adicionado à sua conta.');
    }



    // Método para exibir a página de comparação de planos
    public function showComparisonForm()
    {
        $planos = Plano::all(); // Recuperar todos os planos
        return view('planos.comparar', compact('planos')); // Exibir a página de comparação
    }

    // Método para comparar planos
    public function comparar(Request $request)
    {
        $request->validate([
            'planos' => 'required|array', // Certificar-se de que 'planos' é um array
            'planos.*' => 'exists:planos,id', // Verifica se cada ID existe na tabela de planos
        ]);

        if (empty($request->input('planos'))) {
            return redirect()->route('compararPlanosForm')->with('error', 'Nenhum plano selecionado para comparação.');
        }

        // Recuperar os planos selecionados
        $planosSelecionados = Plano::whereIn('id', $request->input('planos'))->get();

        // Exibir os planos lado a lado para comparação
        return view('planos.mostrar_comparacao', compact('planosSelecionados'));
    }

    // Método para exibir a página de pesquisa de planos
    public function showSearchForm(Request $request)
    {
        // Obtenha tipos e faixas etárias distintas
        $tipos = Plano::select('tipo')->distinct()->get();
        $faixaEtarias = Plano::select('faixaetaria')->distinct()->get();

        // Query inicial para buscar planos
        $planos = Plano::query();

        // Construindo a mensagem de filtros aplicados
        $filtrosAplicados = "Filtros aplicados: ";

        // Filtro de tipo
        if ($request->filled('tipo')) {
            $planos->where('tipo', $request->tipo);
            $filtrosAplicados .= "Tipo: " . ucfirst($request->tipo) . "; ";
        } else {
            $filtrosAplicados .= "Tipo: Todos; ";
        }

        // Filtro de faixa etária (aplicado somente se estiver preenchido)
        if ($request->filled('faixaetaria')) {
            if (strpos($request->faixaetaria, '-') !== false) {
                [$idadeMinFiltro, $idadeMaxFiltro] = explode('-', $request->faixaetaria);
                $planos->where(function ($query) use ($idadeMinFiltro, $idadeMaxFiltro) {
                    $query->whereRaw("CAST(SUBSTRING_INDEX(faixaetaria, '-', 1) AS UNSIGNED) <= ?", [$idadeMaxFiltro])
                        ->whereRaw("CAST(SUBSTRING_INDEX(faixaetaria, '-', -1) AS UNSIGNED) >= ?", [$idadeMinFiltro]);
                });
                $filtrosAplicados .= "Faixa Etária: " . $request->faixaetaria . "; ";
            } else {
                $idadeMinFiltro = (int) $request->faixaetaria;
                $planos->whereRaw("CAST(SUBSTRING_INDEX(faixaetaria, '-', -1) AS UNSIGNED) >= ?", [$idadeMinFiltro]);
                $filtrosAplicados .= "Faixa Etária: " . $request->faixaetaria . "; ";
            }
        } else {
            $filtrosAplicados .= "Faixa Etária: Todas";
        }

        // Executa a consulta e obtém os resultados
        $resultados = $planos->get();

        // Se não houver resultados, exibe uma mensagem informativa
        if ($resultados->isEmpty()) {
            return view('planos.pesquisar', compact('tipos', 'faixaEtarias'))
                ->with('mensagem', 'Nenhum plano encontrado com os critérios selecionados.')
                ->with('filtrosAplicados', $filtrosAplicados);
        }

        return view('planos.pesquisar', compact('resultados', 'tipos', 'faixaEtarias', 'filtrosAplicados'));
    }
}
