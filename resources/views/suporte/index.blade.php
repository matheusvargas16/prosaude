<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
        <h1 class="text-4xl font-semibold text-teal-600 mb-8 text-center">Meus Tickets de Suporte</h1>

        <!-- Exibição de mensagem de sucesso ao criar um ticket -->
        @if (session('status'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

        <!-- Lista de Tickets -->
        <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200 mb-8">
            <h2 class="text-2xl font-semibold text-teal-700 mb-4">Meus Tickets</h2>

            @if($suportes->isEmpty())
                <p class="text-gray-600">Você ainda não criou nenhum ticket de suporte.</p>
            @else
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-teal-600">Título</th>
                            <th class="px-4 py-2 text-left text-teal-600">Status</th>
                            <th class="px-4 py-2 text-left text-teal-600">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suportes as $suporte)
                            <tr class="border-b">
                                <td class="px-4 py-2">{{ $suporte->titulo }}</td>
                                <td class="px-4 py-2">
                                    <span class="px-3 py-1 rounded-full text-white
                                        @if($suporte->status == 'Aberto') bg-teal-500
                                        @elseif($suporte->status == 'Em andamento') bg-yellow-500
                                        @elseif($suporte->status == 'Fechado') bg-gray-500 @endif">
                                        {{ $suporte->status }}
                                    </span>
                                </td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('suporte.show', $suporte->id) }}" class="text-teal-500 hover:text-teal-700">Ver</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <!-- Botão para Criar Novo Ticket -->
        <div class="text-center">
            <a href="{{ route('suporte.criar') }}" class="bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-600 transition duration-300">
                Criar Novo Ticket
            </a>
            
        </div>
    </div>
</x-app-layout>
