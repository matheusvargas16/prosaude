<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $plano->nome }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Detalhes do Plano -->
                    <h1 class="text-2xl font-semibold text-teal-600 mb-4">{{ $plano->nome }}</h1>
                    
                    <div class="mb-4">
                        <p class="text-lg"><strong>Descrição:</strong> {{ $plano->cobertura }}</p>
                        <p class="text-lg"><strong>Preço:</strong> R$ {{ number_format($plano->preco, 2, ',', '.') }}</p>
                        <p class="text-lg"><strong>Tipo de Plano:</strong> {{ $plano->tipo }}</p>
                    </div>
                    
                    <!-- Botão para confirmar a compra -->
                    <a href="{{ route('finalizar.compra', $plano->id) }}" class="inline-block mt-4 bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-lg shadow-lg transition duration-200">
                        Comprar Plano
                    </a>

                    <!-- Botão para voltar à página de planos -->
                    <a href="{{ route('comprar.planos') }}" class="inline-block mt-4 ml-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow-lg transition duration-200">
                        Voltar para Planos
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
