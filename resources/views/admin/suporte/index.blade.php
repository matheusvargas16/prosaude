<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Gerenciar Suporte</h1>

        <!-- Tickets Table -->
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Título</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Ações</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach($suportes as $suporte)
                <tr>
                    <td class="border px-4 py-2">{{ $suporte->id }}</td>
                    <td class="border px-4 py-2">{{ $suporte->titulo }}</td>
                    <td class="border px-4 py-2">{{ $suporte->status }}</td>
                    <td class="border px-4 py-2">
                        <!-- Redireciona para a página de resolução -->
                        <a href="{{ route('admin.suporte.resolvePage', $suporte->id) }}" class="text-green-500">Resolver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginação -->
        <div class="mt-4">
            {{ $suportes->links() }}
        </div>
    </div>
</x-app-layout>
