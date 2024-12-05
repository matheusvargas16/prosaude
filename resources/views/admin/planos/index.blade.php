<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Gerenciar Planos</h1>

        <!-- Exibir mensagem de sucesso -->
        @if (session('success'))
            <div class="bg-green-500 text-white px-6 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Button to create a new plan -->
        <div class="mb-4">
            <a href="{{ route('admin.planos.create') }}" class="px-4 py-2 bg-green-500 text-white rounded-md">Novo Plano</a>
        </div>

        <!-- Plans Table -->
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Nome</th>
                    <th class="border px-4 py-2">Tipo</th>
                    <th class="border px-4 py-2">Ações</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach($planos as $plano)
                    <tr>
                        <td class="border px-4 py-2">{{ $plano->id }}</td>
                        <td class="border px-4 py-2">{{ $plano->nome }}</td>
                        <td class="border px-4 py-2">{{ $plano->tipo }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('admin.planos.edit', $plano->id) }}" class="text-yellow-500">Editar</a> |
                            <!-- Button to trigger delete confirmation modal -->
                            <button onclick="openDeleteModal({{ $plano->id }})" class="text-red-500">Excluir</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $planos->links() }}
        </div>
    </div>

    <!-- Modal for delete confirmation -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-6 rounded-md shadow-lg max-w-sm w-full">
            <h2 class="text-lg font-semibold mb-4">Confirmar Exclusão</h2>
            <p>Tem certeza que deseja excluir este plano?</p>
            <div class="mt-4">
                <!-- Form to delete plan -->
                <form id="deleteForm" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md">Excluir</button>
                    <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 bg-gray-300 text-black rounded-md ml-2">Cancelar</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal(planId) {
            // Set the action URL to the delete form
            document.getElementById('deleteForm').action = '/admin/planos/' + planId;

            // Show the modal
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            // Hide the modal
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
</x-app-layout>
