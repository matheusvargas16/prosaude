<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Apolice;
use App\Models\User;
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
        // Validar os dados enviados no formulário
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
        ]);
    
        // Recuperar o plano pelo ID
        $plano = Plano::findOrFail($id);
    
        // Dados do comprador (usuário autenticado)
        $usuario = auth()->user();
    
        // Verificar se o usuário já tem uma apólice ativa
        $apoliceAtiva = Apolice::where('usuario_id', $usuario->id)
                                ->where('status', 'ativa')
                                ->first();
    
        if ($apoliceAtiva) {
            // Cancelar a apólice ativa anterior
            $apoliceAtiva->update(['status' => 'cancelada']);
        }
    
        // Criar a nova apólice com os dados fornecidos
        $apolice = Apolice::create([
            'usuario_id' => $usuario->id,
            'plano_id' => $plano->id,
            'preco' => $plano->preco,
            'status' => 'ativa', // Definindo status da apólice como ativa
            'datainicio' => now(),
            'datafim' => now()->addYear(), // Definindo a data de fim como 1 ano após a data de início
            'endereco' => $validated['endereco'], // Endereço fornecido pelo usuário
            'cidade' => $validated['cidade'], // Cidade fornecida pelo usuário
        ]);
    
        // Dados para exibição na página de confirmação
        // Dados para exibição na página de confirmação
        $apoliceData = [
            'id_plano' => $plano->id,
            'nome_comprador' => $usuario->name,
            'endereco_comprador' => $validated['endereco'],
            'cidade_comprador' => $validated['cidade'],
            'nome_plano' => $plano->nome,
            'tipo_plano' => $plano->tipo,
            'preco_plano' => number_format($plano->preco, 2, ',', '.'),
            'beneficios' => json_decode($plano->cobertura),
            'data_compra' => now()->format('d/m/Y'),
            'data_vencimento' => $apolice->datafim->format('d/m/Y'), // Formata a data de vencimento
        ];
        // Redireciona para a página de confirmação, passando os dados da apólice
        return view('apolices.detalhes', compact('apoliceData'));
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

        // Filtro de faixa etária
        if ($request->filled('faixa_etaria')) {
            $faixaEtaria = $request->faixa_etaria;

            if (strpos($faixaEtaria, '+') !== false) {
                // Caso especial para faixas como "65+"
                $idadeMin = (int) rtrim($faixaEtaria, '+'); // Remove o "+"
                $planos->whereRaw("CAST(SUBSTRING_INDEX(faixaetaria, '-', -1) AS UNSIGNED) >= ?", [$idadeMin])
                    ->where('faixaetaria', 'NOT LIKE', '%-%'); // Exclui faixas com traço
                $filtrosAplicados .= "Faixa Etária: " . $faixaEtaria . "; ";
            } elseif (strpos($faixaEtaria, '-') !== false) {
                // Faixa etária no formato "X-Y"
                [$idadeMin, $idadeMax] = explode('-', $faixaEtaria);
                $planos->where(function ($query) use ($idadeMin, $idadeMax) {
                    $query->whereRaw("CAST(SUBSTRING_INDEX(faixaetaria, '-', 1) AS UNSIGNED) <= ?", [$idadeMax])
                        ->whereRaw("CAST(SUBSTRING_INDEX(faixaetaria, '-', -1) AS UNSIGNED) >= ?", [$idadeMin]);
                });
                $filtrosAplicados .= "Faixa Etária: " . $faixaEtaria . "; ";
            } else {
                // Caso de idade mínima específica
                $idadeMin = (int) $faixaEtaria;
                $planos->whereRaw("CAST(SUBSTRING_INDEX(faixaetaria, '-', -1) AS UNSIGNED) >= ?", [$idadeMin]);
                $filtrosAplicados .= "Faixa Etária: " . $faixaEtaria . "; ";
            }
        } else {
            $filtrosAplicados .= "Faixa Etária: Todas; ";
        }

        // Filtro de preço máximo
        if ($request->filled('preco_max')) {
            $planos->where('preco', '<=', $request->preco_max);
            $filtrosAplicados .= "Preço Máximo: R$ " . number_format($request->preco_max, 2, ',', '.') . "; ";
        }

        // Filtro de benefícios
        if ($request->filled('beneficio')) {
            $planos->where('cobertura', 'LIKE', '%' . $request->beneficio . '%');
            $filtrosAplicados .= "Benefício: " . ucfirst($request->beneficio) . "; ";
        }

        // Executa a consulta e obtém os resultados
        $resultados = $planos->get();

        // Retorna a view com os dados e a mensagem de filtros aplicados
        return view('planos.pesquisar', compact('resultados', 'tipos', 'faixaEtarias', 'filtrosAplicados'))
            ->with('mensagem', $resultados->isEmpty() ? 'Nenhum plano encontrado com os critérios selecionados.' : null);
    }





}
