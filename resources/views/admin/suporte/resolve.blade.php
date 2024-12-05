<!-- resources/views/admin/suporte/resolver.blade.php -->
<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Resolver Ticket: {{ $suporte->titulo }}</h1>

        <!-- Exibir a mensagem original do ticket -->
        <div class="mb-4 p-4 bg-gray-100 border border-gray-300 rounded-md">
            <h2 class="text-xl font-semibold mb-2">Problema:</h2>
            <p class="text-gray-700">{{ $suporte->descricao }}</p>  <!-- Supondo que 'mensagem' seja o campo que contém o texto original -->
        </div>

        <!-- Formulário de Resolução -->
        <form action="{{ route('admin.suporte.resolve', $suporte->id) }}" method="POST">
            @csrf
            @method('POST')

            <div class="mb-4">
                <label for="resolucao" class="block text-sm font-medium text-gray-700">Descrição da Resolução</label>
                <textarea id="resolucao" name="resolucao" rows="4" class="mt-1 block w-full border-gray-300 rounded-md" required></textarea>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Resolver</button>
            </div>
        </form>
    </div>
</x-app-layout>
