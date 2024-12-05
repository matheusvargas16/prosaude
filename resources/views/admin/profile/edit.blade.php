<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil de Administrador') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Exibir mensagem de sucesso -->
            @if (session('success'))
                <div class="bg-green-500 text-white px-6 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Seção para Atualizar Informações do Perfil -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form', ['label' => 'Informações do Perfil'])
                </div>
            </div>

            <!-- Seção para Atualizar Senha -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form', ['label' => 'Atualizar Senha'])
                </div>
            </div>

            <!-- Seção para Excluir Conta -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form', ['label' => 'Excluir Conta'])
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
