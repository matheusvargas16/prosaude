<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Exibir mensagem de sucesso -->
            @if (session('success'))
                <div class="bg-green-500 text-white px-6 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Seção para Exibir Andamento das Apólices -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="font-semibold text-lg text-gray-800 mb-4">Andamento das Suas Apólices</h3>
                    @forelse ($apolices as $apolice)
                        <div class="border-b border-gray-200 py-2">
                            <!-- Mostrar o nome do plano -->
                            <p><strong>Plano:</strong> {{ $apolice->plano->nome }}</p>

                            <!-- Formatar as datas -->
                            <p><strong>Data de Vencimento:</strong> {{ \Carbon\Carbon::parse($apolice->datafim)->format('d/m/Y') }}</p>

                            <!-- Mostrar o valor -->
                            <p><strong>Valor Mensal:</strong> R$ {{ number_format($apolice->preco, 2, ',', '.') }}</p>

                            <!-- Botões de Cancelar, Renovar ou Gerar Apólice -->
                            <div class="flex items-center space-x-4 mt-2">
                                @if ($apolice->status === 'ativa')
                                    <form action="{{ route('cancelar.apolice', $apolice->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja cancelar esta apólice?')">
                                        @csrf
                                        @method('PUT') <!-- Usando PUT para atualização -->
                                        <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600 transition duration-300">
                                            Cancelar Apólice
                                        </button>
                                    </form>

                                    <!-- Botão de Renovar Apólice -->
                                    <form action="{{ route('apolice.renovar', $apolice->id) }}" method="GET" class="inline">
                                        <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600 transition duration-300">
                                            Renovar Apólice
                                        </button>
                                    </form>

                                    <!-- Botão de Gerar Apólice -->
                                    <a href="{{ route('apolice.gerar', $apolice->id) }}" class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600 transition duration-300">
                                        Gerar PDF da Apólice
                                    </a>
                                @else
                                    <p class="text-gray-600"><strong>Status:</strong> {{ $apolice->status }}</p>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p>Você ainda não possui apólices cadastradas.</p>
                    @endforelse
                </div>
            </div>

            <!-- Botão de Histórico de Apólices -->
            <div class="mt-4 text-center">
                <a href="{{ route('historico.apolices') }}" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition duration-300">
                    Histórico de Apólices
                </a>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form', ['label' => 'Informações do Perfil'])
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form', ['label' => 'Atualizar Senha'])
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form', ['label' => 'Excluir Conta'])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
