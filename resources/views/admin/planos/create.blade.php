<!-- resources/views/admin/planos/create.blade.php -->
<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Criar Novo Plano</h1>

        <form action="{{ route('admin.planos.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nome" class="block text-lg font-medium">Nome</label>
                <input type="text" name="nome" id="nome" value="{{ old('nome') }}" class="mt-1 block w-full p-2 border rounded-md" required>
                @error('nome')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tipo" class="block text-lg font-medium">Tipo</label>
                <select name="tipo" id="tipo" class="mt-1 block w-full p-2 border rounded-md" required>
                    <option value="individual" {{ old('tipo') == 'individual' ? 'selected' : '' }}>Individual</option>
                    <option value="familiar" {{ old('tipo') == 'familiar' ? 'selected' : '' }}>Familiar</option>
                    <option value="mei" {{ old('tipo') == 'mei' ? 'selected' : '' }}>MEI</option>
                    <option value="coletivo_empresarial" {{ old('tipo') == 'coletivo_empresarial' ? 'selected' : '' }}>Coletivo Empresarial</option>
                    <option value="coletivo_adesao" {{ old('tipo') == 'coletivo_adesao' ? 'selected' : '' }}>Coletivo por Adesão</option>
                </select>
                @error('tipo')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="cobertura" class="block text-lg font-medium">Cobertura (separe por vírgulas)</label>
                <input type="text" name="cobertura" id="cobertura" value="{{ old('cobertura') }}" class="mt-1 block w-full p-2 border rounded-md" required>
                @error('cobertura')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>            

            <div class="mb-4">
                <label for="faixaetaria" class="block text-lg font-medium">Faixa Etária</label>
                <input type="text" name="faixaetaria" id="faixaetaria" value="{{ old('faixaetaria') }}" class="mt-1 block w-full p-2 border rounded-md" required>
                @error('faixaetaria')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="preco" class="block text-lg font-medium">Preço</label>
                <input type="number" name="preco" id="preco" value="{{ old('preco') }}" class="mt-1 block w-full p-2 border rounded-md" required>
                @error('preco')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md">Criar Plano</button>
            </div>
        </form>
    </div>
</x-app-layout>
