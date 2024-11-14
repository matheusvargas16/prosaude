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
                    <h1 class="text-4xl font-bold text-center text-teal-600 mb-8">Bem-vindo(a) à Saúde+</h1>
                    <p class="text-lg text-center mb-6 text-gray-700">
                        Obrigado por se cadastrar! Na Saúde+, estamos comprometidos em oferecer o melhor serviço de saúde para você
                        e sua família.
                    </p>

                    <!-- Seção de Planos -->
                    <div class="bg-blue-50 rounded-lg p-6 mb-8">
                        <h2 class="text-2xl font-semibold text-teal-700">Nossos Planos</h2>
                        <ul class="list-disc list-inside text-gray-700 ml-4 mt-4 space-y-2">
                            <li>Plano Individual</li>
                            <li>Plano Familiar</li>
                            <li>Plano MEI</li>
                            <li>Plano Coletivo Empresarial</li>
                            <li>Plano Coletivo por Adesão</li>
                        </ul>
                        <a href="{{ route('comprarPlanos') }}"
                            class="inline-block mt-4 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-lg transition duration-200 text-lg">
                            Comprar Planos
                        </a>
                    </div>

                    <!-- Seção de Benefícios -->
                    <div class="bg-green-50 rounded-lg p-6 mb-8">
                        <h2 class="text-2xl font-semibold text-teal-700">Benefícios para os Clientes</h2>
                        <ul class="list-disc list-inside text-gray-700 ml-4 mt-4 space-y-2">
                            <li>Atendimento rápido e de qualidade</li>
                            <li>Descontos em farmácias parceiras</li>
                            <li>Programas de saúde e bem-estar</li>
                        </ul>
                    </div>

                    <!-- Seção de Comparação -->
                    <div class="bg-yellow-50 rounded-lg p-6 mb-8">
                        <h2 class="text-2xl font-semibold text-teal-700">Compare Nossos Planos</h2>
                        <p class="text-gray-700 mt-4">
                            Você pode comparar os diferentes planos que oferecemos para encontrar o que melhor atende às suas
                            necessidades.
                        </p>
                        <button onclick="window.location.href='{{ route('compararPlanos') }}'"
                            class="text-white bg-yellow-500 hover:bg-yellow-600 px-4 py-2 mt-4 rounded">
                            Clique aqui para comparar os planos
                        </button>
                    </div>

                    <!-- Seção de Pesquisa -->
                    <div class="bg-blue-50 rounded-lg p-6 mb-8">
                        <h2 class="text-2xl font-semibold text-teal-700">Pesquise Nossos Planos</h2>
                        <p class="text-gray-700 mt-4">
                            Encontre o plano ideal filtrando por tipo de cobertura, faixa etária e outras opções para escolher o
                            melhor
                            para você.
                        </p>
                        <button onclick="window.location.href='{{ route('pesquisarPlanos') }}'"
                            class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 mt-4 rounded">
                            Clique aqui para pesquisar os planos
                        </button>
                    </div>

                    <!-- Seção de Suporte -->
                    <div class="bg-red-50 rounded-lg p-6 mb-8">
                        <h2 class="text-2xl font-semibold text-teal-700">Suporte ao Cliente</h2>
                        <p class="text-gray-700 mt-4">
                            Precisa de ajuda? Nossa equipe de suporte está pronta para esclarecer dúvidas e resolver problemas.
                            Você pode abrir um ticket de suporte ou consultar a seção de FAQ para respostas rápidas.
                        </p>
                        <button onclick="window.location.href='{{ route('suporte.index') }}'"
                            class="text-white bg-red-500 hover:bg-red-600 px-4 py-2 mt-4 rounded">
                            Acessar Suporte
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
