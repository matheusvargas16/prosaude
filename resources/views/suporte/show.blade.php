<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
        <h1 class="text-4xl font-semibold text-teal-600 mb-8 text-center">Detalhes do Ticket</h1>

        <!-- Exibição de Ticket -->
        <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200 mb-8">
            <!-- Título do Ticket -->
            <h2 class="text-2xl font-semibold text-teal-700 mb-4">{{ $suporte->titulo }}</h2>

            <!-- Status do Ticket -->
            <p class="text-lg"><strong>Status:</strong> 
                <span class="px-3 py-1 rounded-full text-white
                    @if($suporte->status == 'Aberto') bg-teal-500
                    @elseif($suporte->status == 'Em andamento') bg-yellow-500
                    @elseif($suporte->status == 'Fechado') bg-gray-500 @endif">
                    {{ $suporte->status }}
                </span>
            </p>

            <!-- Descrição do Ticket -->
            <p class="text-lg mt-4"><strong>Descrição:</strong></p>
            <p class="text-lg text-gray-600">{{ $suporte->descricao }}</p>

            <!-- Resolução do Ticket -->
            <div class="mt-6">
                <p class="text-lg"><strong>Resolução:</strong></p>
                @if($suporte->resolucao)
                    <p class="text-lg text-gray-600">{{ $suporte->resolucao }}</p>
                @else
                    <p class="text-lg text-gray-600">Problema sendo analisado</p>
                @endif
            </div>

            <!-- Ações do Ticket -->
            <div class="mt-6 flex justify-center gap-4">
                <a href="{{ route('suporte.index') }}" class="bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-600 transition duration-300">
                    Voltar para Meus Tickets
                </a>

                <!-- Botão para Editar Ticket -->
                <a href="{{ route('suporte.edit', $suporte->id) }}" class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600 transition duration-300">
                    Editar Ticket
                </a>

                <!-- Botão para Excluir Ticket -->
                <form method="POST" action="{{ route('suporte.destroy', $suporte->id) }}" onsubmit="return confirm('Tem certeza que deseja excluir este ticket?');">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600 transition duration-300">
                        Excluir Ticket
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
