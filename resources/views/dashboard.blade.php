<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-4xl font-bold text-center text-teal-600 mb-8">
                        Bem-vindo(a) à Saúde+
                    </h1>
                    <p class="text-lg text-center mb-6 text-gray-700">
                        Obrigado por se cadastrar! Na Saúde+, estamos comprometidos em oferecer o melhor serviço de
                        saúde para você e sua família.
                    </p>

                    <!-- Grid para os cartões -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                        <!-- Cartão de Benefícios -->
                        <div class="bg-green-50 rounded-lg p-6 shadow-lg">
                            <h2 class="text-2xl font-semibold text-teal-700 mb-4">Benefícios</h2>
                            <ul class="list-disc list-inside text-gray-700 space-y-2">
                                <li>Atendimento rápido e de qualidade</li>
                                <li>Descontos em farmácias parceiras</li>
                                <li>Programas de saúde e bem-estar</li>
                            </ul>
                        </div>

                        <!-- Cartão de Planos -->
                        <div class="bg-blue-50 rounded-lg p-6 shadow-lg">
                            <h2 class="text-2xl font-semibold text-teal-700 mb-4">Nossos Planos</h2>
                            <ul class="list-disc list-inside text-gray-700 space-y-2">
                                <li>Plano Individual</li>
                                <li>Plano Familiar</li>
                                <li>Plano MEI</li>
                                <li>Plano Coletivo Empresarial</li>
                                <li>Plano Coletivo por Adesão</li>
                            </ul>
                            <a href="{{ route('comprarPlanos') }}"
                                class="inline-block mt-4 bg-teal-600 hover:bg-teal-700 text-white font-bold py-2 px-6 rounded-lg shadow-lg transition duration-200">
                                Comprar Planos
                            </a>
                        </div>

                        <!-- Cartão de Comparação -->
                        <div class="bg-yellow-50 rounded-lg p-6 shadow-lg">
                            <h2 class="text-2xl font-semibold text-teal-700 mb-4">Compare Nossos Planos</h2>
                            <p class="text-gray-700">
                                Compare os diferentes planos para encontrar o que melhor atende às suas necessidades.
                            </p>
                            <button onclick="window.location.href='{{ route('compararPlanos') }}'"
                                class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 mt-4 rounded-lg shadow-lg transition duration-200">
                                Comparar Planos
                            </button>
                        </div>

                        <!-- Cartão de Pesquisa -->
                        <div class="bg-indigo-50 rounded-lg p-6 shadow-lg">
                            <h2 class="text-2xl font-semibold text-teal-700 mb-4">Pesquise Planos</h2>
                            <p class="text-gray-700">
                                Filtre por tipo de cobertura, faixa etária e outras opções para escolher o melhor para
                                você.
                            </p>
                            <button onclick="window.location.href='{{ route('pesquisarPlanos') }}'"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 mt-4 rounded-lg shadow-lg transition duration-200">
                                Pesquisar Planos
                            </button>
                        </div>

                        <!-- Cartão de Suporte -->
                        <div class="bg-red-50 rounded-lg p-6 shadow-lg">
                            <h2 class="text-2xl font-semibold text-teal-700 mb-4">Suporte ao Cliente</h2>
                            <p class="text-gray-700">
                                Precisa de ajuda? Nossa equipe está pronta para esclarecer dúvidas e resolver problemas.
                            </p>
                            <button onclick="window.location.href='{{ route('suporte.index') }}'"
                                class="bg-pink-600 hover:bg-pink-700 text-white px-4 py-2 mt-4 rounded-lg shadow-lg transition duration-200">
                                Acessar Suporte
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>