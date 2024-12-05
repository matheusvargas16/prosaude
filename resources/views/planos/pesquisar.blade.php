<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pesquisar Planos de Saúde') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-semibold text-teal-600 mb-6">Pesquisar Planos de Saúde</h1>

                    <!-- Formulário de Filtros -->
                    <form method="GET" action="{{ route('pesquisarPlanos') }}" class="bg-white shadow-lg rounded-lg p-6 border border-gray-200" style="background-color: #f0f9ff;">
                        <h2 class="text-xl font-medium text-blue-600 mb-4">Filtre os Planos de Saúde</h2>

                        <!-- Tipo de Plano -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Tipo de Plano:</label>
                            <select name="tipo" class="w-full p-2 border rounded border-blue-200" style="background-color: #e0f2fe;">
                                <option value="">Selecione</option>
                                <option value="Individual">Individual</option>
                                <option value="Familiar">Familiar</option>
                                <option value="MEI">MEI</option>
                                <option value="Coletivo Empresarial">Coletivo Empresarial</option>
                                <option value="Coletivo por Adesão">Coletivo por Adesão</option>
                            </select>
                        </div>

                        <!-- Faixa Etária -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Faixa Etária:</label>
                            <select name="faixa_etaria" class="w-full p-2 border rounded border-blue-200" style="background-color: #e0f2fe;">
                                <option value="">Selecione</option>
                                <option value="0-17">0-17 anos</option>
                                <option value="18-35">18-35 anos</option>
                                <option value="36-50">36-50 anos</option>
                                <option value="51-65">51-65 anos</option>
                                <option value="65+">65+ anos</option>
                            </select>
                        </div>

                        <!-- Preço -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Preço Máximo:</label>
                            <input type="number" name="preco_max" step="0.01" placeholder="Ex.: 500.00" class="w-full p-2 border rounded border-blue-200" style="background-color: #e0f2fe;">
                        </div>

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-4 rounded hover:bg-blue-600 transition-colors" style="background-color: #0284c7;">Pesquisar</button>
                    </form>

                    <!-- Resultados -->
                    @if (isset($resultados))
                        <h2 class="text-2xl font-medium text-teal-700 mt-8">Resultados da Pesquisa</h2>
                        <div class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mt-4">
                            @foreach ($resultados as $plano)
                                <div class="bg-white shadow-md rounded-lg p-4 border border-gray-200" style="background-color: #fdfdfd;">
                                    <h3 class="text-xl font-semibold text-teal-800">{{ $plano->nome }}</h3>
                                    <p><strong>Tipo:</strong> <span class="text-gray-600">{{ $plano->tipo }}</span></p>
                                    
                                    <!-- Exibindo Benefícios -->
                                    <div class="text-lg">
                                        <strong class="text-teal-800">Benefícios:</strong>
                                        <ul class="list-disc pl-5 text-gray-800">
                                            @php
                                                // Tenta decodificar como JSON
                                                $beneficios = json_decode($plano->cobertura, true);
                                                // Se não for JSON válido, divide por vírgulas
                                                if (is_null($beneficios)) {
                                                    $beneficios = explode(',', $plano->cobertura);
                                                }
                                            @endphp
                                            @foreach ($beneficios as $beneficio)
                                                <li>{{ trim($beneficio) }}</li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <p><strong>Faixa Etária:</strong> <span class="text-gray-600">{{ $plano->faixaetaria }}</span></p>
                                    <p><strong>Preço:</strong> <span class="text-gray-600">R$ {{ number_format($plano->preco, 2, ',', '.') }}</span></p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-red-500 mt-4">Nenhum plano encontrado com os critérios selecionados.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
