<!-- resources/views/admin/usuarios/edit.blade.php -->
<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Editar Usuário</h1>

        <form action="{{ route('admin.usuarios.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-lg font-medium">Nome</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full p-2 border rounded-md" required>
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-lg font-medium">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full p-2 border rounded-md" required>
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            

            <div class="mb-4">
                <label for="cpf" class="block text-lg font-medium">CPF</label>
                <input type="text" name="cpf" id="cpf" value="{{ old('cpf', $user->cpf) }}" class="mt-1 block w-full p-2 border rounded-md" required>
                @error('cpf')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="datanascimento" class="block text-lg font-medium">Data de Nascimento</label>
                <input type="date" name="datanascimento" id="datanascimento" value="{{ old('datanascimento', $user->datanascimento) }}" class="mt-1 block w-full p-2 border rounded-md" required>
                @error('datanascimento')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="telefone" class="block text-lg font-medium">Telefone</label>
                <input type="text" name="telefone" id="telefone" value="{{ old('telefone', $user->telefone) }}" class="mt-1 block w-full p-2 border rounded-md" required>
                @error('telefone')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="endereco" class="block text-lg font-medium">Endereço</label>
                <input type="text" name="endereco" id="endereco" value="{{ old('endereco', $user->endereco) }}" class="mt-1 block w-full p-2 border rounded-md" required>
                @error('endereco')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="historicomedico" class="block text-lg font-medium">Histórico Médico</label>
                <textarea name="historicomedico" id="historicomedico" class="mt-1 block w-full p-2 border rounded-md" rows="3" required>{{ old('historicomedico', $user->historicomedico) }}</textarea>
                @error('historicomedico')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="role" class="block text-lg font-medium">Função</label>
                <select name="role" id="role" class="mt-1 block w-full p-2 border rounded-md" required>
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>Usuário</option>
                </select>
                @error('role')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded-md">Atualizar Usuário</button>
            </div>
        </form>
    </div>
</x-app-layout>
