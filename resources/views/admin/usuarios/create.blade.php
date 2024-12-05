<!-- resources/views/admin/usuarios/create.blade.php -->
<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Criar Novo Usuário</h1>

        <form action="{{ route('admin.usuarios.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-lg font-medium">Nome</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full p-2 border rounded-md" required>
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-lg font-medium">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="mt-1 block w-full p-2 border rounded-md" required>
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-lg font-medium">Senha</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full p-2 border rounded-md" required>
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-lg font-medium">Confirmar Senha</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full p-2 border rounded-md" required>
                @error('password_confirmation')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="cpf" class="block text-lg font-medium">CPF</label>
                <input type="text" name="cpf" id="cpf" value="{{ old('cpf') }}" class="mt-1 block w-full p-2 border rounded-md" required>
                @error('cpf')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="datanascimento" class="block text-lg font-medium">Data de Nascimento</label>
                <input type="date" name="datanascimento" id="datanascimento" value="{{ old('datanascimento') }}" class="mt-1 block w-full p-2 border rounded-md" required>
                @error('datanascimento')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="telefone" class="block text-lg font-medium">Telefone</label>
                <input type="text" name="telefone" id="telefone" value="{{ old('telefone') }}" class="mt-1 block w-full p-2 border rounded-md" required>
                @error('telefone')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="endereco" class="block text-lg font-medium">Endereço</label>
                <input type="text" name="endereco" id="endereco" value="{{ old('endereco') }}" class="mt-1 block w-full p-2 border rounded-md" required>
                @error('endereco')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="historicomedico" class="block text-lg font-medium">Histórico Médico</label>
                <textarea name="historicomedico" id="historicomedico" class="mt-1 block w-full p-2 border rounded-md" rows="3" required>{{ old('historicomedico') }}</textarea>
                @error('historicomedico')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="role" class="block text-lg font-medium">Função</label>
                <select name="role" id="role" class="mt-1 block w-full p-2 border rounded-md" required>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Usuário</option>
                </select>
                @error('role')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Criar Usuário</button>
            </div>
        </form>
    </div>
</x-app-layout>
