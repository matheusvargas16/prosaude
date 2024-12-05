<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard do Administrador') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Estatísticas principais -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="p-6 bg-white text-teal-500 border border-gray-300 shadow-lg rounded-lg">
                    <h3 class="font-semibold text-lg mb-2">Total de Usuários</h3>
                    <p class="text-3xl font-bold text-teal-500">{{ $estatisticas['totalUsuarios'] }}</p>
                </div>

                <div class="p-6 bg-white text-teal-500 border border-gray-300 shadow-lg rounded-lg">
                    <h3 class="font-semibold text-lg mb-2">Apólices Ativas</h3>
                    <p class="text-3xl font-bold text-teal-500">{{ $estatisticas['apolicesAtivas'] }}</p>
                </div>

                <div class="p-6 bg-white text-teal-500 border border-gray-300 shadow-lg rounded-lg">
                    <h3 class="font-semibold text-lg mb-2">Apólices Canceladas</h3>
                    <p class="text-3xl font-bold text-teal-500">{{ $estatisticas['apolicesCanceladas'] }}</p>
                </div>
            </div>

            <!-- Estatísticas de Novos Usuários e Apólices -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="p-6 bg-white text-teal-500 border border-gray-300 shadow-lg rounded-lg">
                    <h3 class="font-semibold text-lg mb-2">Novos Usuários no Último Mês</h3>
                    <p class="text-3xl font-bold text-teal-500">{{ $estatisticas['novosUsuarios'] }}</p>
                </div>

                <div class="p-6 bg-white text-teal-500 border border-gray-300 shadow-lg rounded-lg">
                    <h3 class="font-semibold text-lg mb-2">Novas Apólices no Último Mês</h3>
                    <p class="text-3xl font-bold text-teal-500">{{ $estatisticas['novasApolices'] }}</p>
                </div>
            </div>

            <!-- Estatísticas de Planos Cadastrados -->
            <div class="p-6 bg-white text-teal-500 border border-gray-300 shadow-lg rounded-lg">
                <h3 class="font-semibold text-lg mb-2">Total de Planos Cadastrados</h3>
                <p class="text-3xl font-bold text-teal-500">{{ $estatisticas['totalPlanos'] }}</p>
            </div>

            <!-- Últimos Usuários -->
            <div class="p-6 bg-white border border-gray-300 shadow-lg rounded-lg">
                <h3 class="font-semibold text-lg mb-2">Últimos Usuários Cadastrados</h3>
                <ul>
                    @foreach ($ultimosUsuarios as $usuario)
                        <li class="text-sm text-gray-600">
                            {{ $usuario->created_at->format('d/m/Y') }} - {{ $usuario->name }} criou uma conta
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>
