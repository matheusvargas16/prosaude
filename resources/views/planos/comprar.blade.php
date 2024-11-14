<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comprar Plano de Saúde') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-semibold text-teal-600 mb-4">Escolha seu Plano de Saúde</h1>

                    <!-- Loop para exibir todos os planos -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($planos as $plano)
                            <div class="bg-white shadow-lg rounded-lg p-6">
                                <h3 class="text-xl font-semibold">{{ $plano->nome }}</h3>
                                <p class="text-gray-700 mb-4">{{ $plano->descricao }}</p>
                                <p class="text-gray-700 mb-4">Preço: R$ {{ number_format($plano->preco, 2, ',', '.') }}</p>
                                
                                <!-- Botão para comprar -->
                                <a href="{{ route('finalizar.compra', $plano->id) }}" class="inline-block mt-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg shadow-lg transition duration-200">
                                    Comprar
                                </a>
                                
                                <!-- Link para exibir os detalhes -->
                                <a href="{{ route('plano.detalhes', $plano->id) }}" class="inline-block mt-4 bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-lg shadow-lg transition duration-200">
                                    Exibir Detalhes
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
