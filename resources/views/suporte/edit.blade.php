<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
        <h1 class="text-4xl font-semibold text-teal-600 mb-8 text-center">Editar Ticket</h1>

        <!-- Formulário de Edição do Ticket -->
        <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200 mb-8">
            <form method="POST" action="{{ route('suporte.update', $suporte->id) }}">
                @csrf
                @method('PUT')

                <!-- Título do Ticket -->
                <div class="mb-4">
                    <label for="titulo" class="block text-lg font-semibold text-teal-600">Título</label>
                    <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $suporte->titulo) }}" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500" required>
                </div>

                <!-- Descrição do Ticket -->
                <div class="mb-4">
                    <label for="descricao" class="block text-lg font-semibold text-teal-600">Descrição</label>
                    <textarea id="descricao" name="descricao" rows="4" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500" required>{{ old('descricao', $suporte->descricao) }}</textarea>
                </div>

                <!-- Status do Ticket -->
                <div class="mb-4">
                    <label for="status" class="block text-lg font-semibold text-teal-600">Status</label>
                    <select id="status" name="status" class="mt-2 p-3 w-full border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500">
                        <option value="Aberto" @if($suporte->status == 'Aberto') selected @endif>Aberto</option>
                        <option value="Em andamento" @if($suporte->status == 'Em andamento') selected @endif>Em andamento</option>
                        <option value="Fechado" @if($suporte->status == 'Fechado') selected @endif>Fechado</option>
                    </select>
                </div>

                <!-- Botões para salvar ou cancelar -->
                <div class="mt-6 flex justify-center gap-4">
                    <button type="submit" class="bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-600 transition duration-300">
                        Atualizar Ticket
                    </button>
                    <a href="{{ route('suporte.index') }}" class="bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600 transition duration-300">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
