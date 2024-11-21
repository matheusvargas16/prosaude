<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Histórico de Apólices Canceladas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Seção para Exibir Apólices Canceladas -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="font-semibold text-lg text-gray-800 mb-4">Apólices Canceladas</h3>
                    @forelse ($apolicesCanceladas as $apolice)
                        <div class="border-b border-gray-200 py-2">
                            <!-- Mostrar o nome do plano -->
                            <p><strong>Plano:</strong> {{ $apolice->plano->nome }}</p>

                            <!-- Formatar as datas -->
                            <p><strong>Data de Vencimento:</strong> {{ \Carbon\Carbon::parse($apolice->datafim)->format('d/m/Y') }}</p>

                            <!-- Mostrar o valor -->
                            <p><strong>Valor Mensal:</strong> R$ {{ number_format($apolice->preco, 2, ',', '.') }}</p>

                            <!-- Mostrar o status -->
                            <p><strong>Status:</strong> {{ $apolice->status }}</p>
                        </div>
                    @empty
                        <p>Você não possui apólices canceladas.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
