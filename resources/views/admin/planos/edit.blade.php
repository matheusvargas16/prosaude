<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Editar Plano</h1>

        <form action="{{ route('admin.planos.update', $plano->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nome -->
            <div class="mb-4">
                <label for="nome" class="block text-lg font-medium">Nome</label>
                <input type="text" name="nome" id="nome" value="{{ old('nome', $plano->nome) }}" class="mt-1 block w-full p-2 border rounded-md" required>
                @error('nome')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Tipo -->
            <div class="mb-4">
                <label for="tipo" class="block text-lg font-medium">Tipo</label>
                <select name="tipo" id="tipo" class="mt-1 block w-full p-2 border rounded-md" required>
                    <option value="individual" {{ old('tipo', $plano->tipo) == 'individual' ? 'selected' : '' }}>Individual</option>
                    <option value="familiar" {{ old('tipo', $plano->tipo) == 'familiar' ? 'selected' : '' }}>Familiar</option>
                    <option value="mei" {{ old('tipo', $plano->tipo) == 'mei' ? 'selected' : '' }}>MEI</option>
                    <option value="coletivo_empresarial" {{ old('tipo', $plano->tipo) == 'coletivo_empresarial' ? 'selected' : '' }}>Coletivo Empresarial</option>
                    <option value="coletivo_adesao" {{ old('tipo', $plano->tipo) == 'coletivo_adesao' ? 'selected' : '' }}>Coletivo por Adesão</option>
                </select>
                @error('tipo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Cobertura -->
            <div class="mb-4">
                <label for="cobertura" class="block text-lg font-medium">Cobertura</label>
                <textarea name="cobertura" id="cobertura" rows="6" class="mt-1 block w-full p-2 border rounded-md" required>{{ old('cobertura', implode(', ', json_decode($plano->cobertura, true) ?? explode(',', $plano->cobertura))) }}</textarea>
                <p class="text-sm text-gray-600 mt-1">Separe os benefícios com vírgulas.</p>
                @error('cobertura')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Faixa Etária -->
            <div class="mb-4">
                <label for="faixaetaria" class="block text-lg font-medium">Faixa Etária</label>
                <input type="text" name="faixaetaria" id="faixaetaria" value="{{ old('faixaetaria', $plano->faixaetaria) }}" class="mt-1 block w-full p-2 border rounded-md" required>
                @error('faixaetaria')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Preço -->
            <div class="mb-4">
                <label for="preco" class="block text-lg font-medium">Preço</label>
                <input type="text" name="preco" id="preco" value="{{ old('preco', number_format($plano->preco, 2, ',', '.')) }}" class="mt-1 block w-full p-2 border rounded-md" required>
                @error('preco')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botões -->
            <div class="mt-6">
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md shadow hover:bg-green-700">Salvar Alterações</button>
                <a href="{{ route('admin.planos.index') }}" class="ml-4 px-4 py-2 bg-gray-600 text-white rounded-md shadow hover:bg-gray-700">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>
