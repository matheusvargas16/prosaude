<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resultado da Comparação de Planos') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
        <h1 class="text-4xl font-semibold text-teal-600 mb-8 text-center">Resultado da Comparação de Planos</h1>
        
        <!-- Grid de planos selecionados -->
        <div class="grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($planosSelecionados as $plano)
                <div class="bg-gradient-to-br from-yellow-100 to-teal-50 shadow-lg rounded-lg p-6 border border-teal-200 transform transition duration-300 hover:scale-105">
                    <h2 class="text-3xl font-bold text-teal-700 mb-4">{{ $plano->nome }}</h2>
                    <p class="text-lg">
                        <strong class="text-teal-800">Tipo:</strong> <span class="text-gray-800">{{ $plano->tipo }}</span>
                    </p>
                    <div class="text-lg">
                        <strong class="text-teal-800">Benefícios:</strong>
                        <ul class="list-disc pl-5 text-gray-800">
                            @foreach (json_decode($plano->cobertura) as $beneficio)
                                <li>{{ $beneficio }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <p class="text-lg">
                        <strong class="text-teal-800">Faixa Etária:</strong> <span class="text-gray-800">{{ $plano->faixaetaria }}</span>
                    </p>
                    <p class="text-lg">
                        <strong class="text-teal-800">Preço:</strong> <span class="text-red-600 font-semibold">R$ {{ number_format($plano->preco, 2, ',', '.') }}</span>
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
