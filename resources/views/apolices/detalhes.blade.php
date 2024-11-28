<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes da Apólice') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Mensagem de Sucesso -->
                    <h1 class="text-3xl font-bold text-teal-600 mb-6">
                        Parabéns pela compra!
                    </h1>
                    <p class="text-lg mb-4">
                        Sua apólice foi gerada com sucesso. Para acessar os detalhes e gerar o documento em PDF, vá até o seu perfil.
                    </p>
                    
                    <!-- Mensagem adicional -->
                    <p class="text-lg mb-4">
                        Você fez uma ótima escolha em fazer negócio com a gente. Estamos felizes em tê-lo como cliente e prontos para atender suas necessidades com o nosso plano de saúde!
                    </p>

                    <!-- Informações da Apólice -->
                    <div class="bg-gray-100 p-4 rounded-lg mb-4">
                        <h3 class="text-xl font-semibold text-teal-600">Informações da Apólice</h3>
                        <p class="text-lg"><strong>Data de Vencimento:</strong> {{ $apoliceData['data_vencimento'] }}</p>
                        <p class="text-lg"><strong>Valor Mensal:</strong> R$ {{ $apoliceData['preco_plano'], 2, ',', '.'}}</p>
                    </div>

                    <!-- Botão para ir ao Perfil -->
                    <a href="{{ route('profile.edit') }}" 
                       class="inline-block mt-6 bg-teal-600 hover:bg-teal-700 text-white font-semibold py-2 px-4 rounded-lg shadow-lg">
                        Ir para o Perfil
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
