<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
        <h1 class="text-4xl font-semibold text-teal-600 mb-8 text-center">Editar Ticket</h1>

        <form method="POST" action="{{ route('suporte.update', $suporte->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text" name="titulo" id="titulo" value="{{ $suporte->titulo }}" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500">
            </div>

            <div class="mb-4">
                <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
                <textarea name="descricao" id="descricao" rows="4"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500">{{ $suporte->descricao }}</textarea>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500">
                    <option value="Aberto" {{ $suporte->status == 'Aberto' ? 'selected' : '' }}>Aberto</option>
                    <option value="Em andamento" {{ $suporte->status == 'Em andamento' ? 'selected' : '' }}>Em andamento</option>
                    <option value="Fechado" {{ $suporte->status == 'Fechado' ? 'selected' : '' }}>Fechado</option>
                </select>
            </div>

            <div class="mt-6 text-center">
                <button type="submit" class="bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-600 transition duration-300">
                    Salvar Alterações
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
