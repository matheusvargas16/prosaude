<?php

namespace App\Http\Controllers;

use App\Models\Apolice;
use App\Models\Plano;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Barryvdh\DomPDF\Facade\Pdf;

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

    
    public function gerarApolice($apoliceId)
    {
        // Recuperar a apólice pelo ID
        $apolice = Apolice::with('plano', 'usuario')->findOrFail($apoliceId); // Inclui relações para evitar múltiplas consultas

        // Verificar se a data de fim existe e é válida
        if (empty($apolice->datafim)) {
            return redirect()->back()->withErrors(['msg' => 'Data de fim não encontrada ou inválida para a apólice.']);
        }

        // Calcular a data de fim (1 ano após a data de início)
        $datafim = now()->addYear()->format('Y-m-d'); // Adiciona 1 ano à data atual

        // Criar a variável apoliceData com os dados necessários
        $apoliceData = [
            'nome_plano' => $apolice->plano->nome,
            'tipo_plano' => $apolice->plano->tipo,
            'preco_plano' => number_format($apolice->preco, 2, ',', '.'),
            'beneficios' => json_decode($apolice->plano->cobertura),
            'data_geracao' => now()->format('d/m/Y'),
            'nome_comprador' => $apolice->usuario->name,
            'cpf_comprador' => $apolice->usuario->cpf,
            'endereco_comprador' => $apolice->endereco,
            'cidade_comprador' => $apolice->cidade,
            'telefone_comprador' => $apolice->usuario->telefone,
            'data_compra' => $apolice->created_at->format('d/m/Y'),
            'datafim' => $datafim,
            'nome_empresa' => 'Saúde+',
            'logo_path' => public_path('images/logo.png'),
        ];

        // Gerar o PDF
        $pdf = PDF::loadView('apolices.pdf', $apoliceData);

        // Retornar o PDF como download
        return $pdf->download('apolice_' . $apolice->id . '.pdf');
    }



    
    public function renovar(Request $request, $id)
    {
        // Buscar a apólice no banco de dados
        $apolice = Apolice::findOrFail($id);
    
        // Renovar a apólice (exemplo de renovação com a data de vencimento alterada)
        $apolice->status = 'ativa';  // Atualizando status para "ativa"
        $apolice->datafim = now()->addYear();  // Exemplo de renovação por mais 1 ano
        $apolice->save();  // Salvar a apólice renovada
    
        // Redirecionar para o perfil com uma mensagem de sucesso
        return redirect()->route('profile.edit')->with('success', 'Apólice renovada com sucesso!');
    }
    
    
    
    public function mostrarRenovacao($id)
    {
        // Buscar a apólice no banco de dados
        $apolice = Apolice::findOrFail($id);

        // Passar a apólice para a view de renovação
        return view('apolices.renovacao', compact('apolice'));
    }

    

    

    
    
    






    public function store(Request $request)
    {
        // Validação dos dados de entrada
        $validated = $request->validate([
            'plano_id' => 'required|exists:planos,id',
        ]);

        // Obter o usuário autenticado
        $user = auth()->user();

        // Verificar se o usuário já possui uma apólice ativa
        $apoliceAtiva = Apolice::where('user_id', $user->id)
            ->where('status', 'Ativa')
            ->first();

        // Se houver uma apólice ativa, desativá-la
        if ($apoliceAtiva) {
            $apoliceAtiva->update(['status' => 'Inativa']);
        }

        // Criar a nova apólice como ativa
        Apolice::create([
            'user_id' => $user->id,
            'plano_id' => $validated['plano_id'],
            'status' => 'Ativa',
        ]);

        return redirect()->route('apolices.index')->with('status', 'Nova apólice criada com sucesso!');
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

    public function historico()
    {
        // Buscar todas as apólices do usuário com status 'Cancelada'
        $apolicesCanceladas = Apolice::where('usuario_id', auth()->id())
            ->where('status', 'Cancelada')
            ->get();

        // Retornar a view com as apólices canceladas
        return view('profile.historico', compact('apolicesCanceladas'));
    }

    public function cancel($id)
    {
        // Encontrar a apólice pelo ID
        $apolice = Apolice::findOrFail($id);

        // Verificar se a apólice pertence ao usuário autenticado
        if ($apolice->usuario_id !== auth()->id()) {
            // Se não for o proprietário da apólice, negar acesso
            abort(403, 'Acesso negado.');
        }

        // Verificar se a apólice já não foi cancelada
        if ($apolice->status === 'Cancelada') {
            return redirect()->route('profile.show')->with('status', 'Esta apólice já está cancelada.');
        }

        // Atualizar o status da apólice para 'Cancelada'
        $apolice->update(['status' => 'Cancelada']);

        // Retornar ao perfil com mensagem de sucesso
        return redirect()->route('profile.edit')->with('status', 'Apólice cancelada com sucesso.');
    }


}
