<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Renovar Apólice') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h3 class="font-semibold text-lg text-gray-800 mb-4">Renovação da Apólice</h3>
                <p><strong>Plano:</strong> {{ $apolice->plano->nome }}</p>
                <p><strong>Data de Vencimento:</strong> {{ \Carbon\Carbon::parse($apolice->datafim)->format('d/m/Y') }}</p>
                <p><strong>Valor Mensal:</strong> R$ {{ number_format($apolice->preco, 2, ',', '.') }}</p>

                <form action="{{ route('apolice.renovar.confirmar', $apolice->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Usando PUT para renovação -->
                    <div class="mt-4">
                        <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600 transition duration-300">
                            Confirmar Renovação
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
