<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
        <h1 class="text-4xl font-semibold text-teal-600 mb-8 text-center">Criar Novo Ticket de Suporte</h1>

        <!-- Exibição de mensagem de sucesso ou erro -->
        @if (session('status'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('status') }}
            </div>
        @elseif ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulário de Criação de Ticket -->
        <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200 mb-8">
            <form action="{{ route('suporte.store') }}" method="POST">
                @csrf

                <!-- Campo para Título -->
                <div class="mb-4">
                    <label for="titulo" class="block text-lg font-medium text-teal-600">Título</label>
                    <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}" class="w-full mt-2 px-4 py-2 border rounded-lg" required>
                </div>

                <!-- Campo para Descrição -->
                <div class="mb-4">
                    <label for="descricao" class="block text-lg font-medium text-teal-600">Descrição</label>
                    <textarea id="descricao" name="descricao" class="w-full mt-2 px-4 py-2 border rounded-lg" rows="5" required>{{ old('descricao') }}</textarea>
                </div>

                <!-- Botão para Submeter o Formulário -->
                <div class="text-center">
                    <button type="submit" class="bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-600 transition duration-300">
                        Criar Ticket
                    </button>
                </div>
            </form>
        </div>

        <!-- Botão para Voltar -->
        <div class="text-center mt-6">
            <a href="{{ route('suporte.index') }}" class="text-teal-500 hover:text-teal-700">
                Voltar para Meus Tickets
            </a>
        </div>
    </div>
</x-app-layout>
