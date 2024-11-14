<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('register') }}" class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6" style="background-color: rgb(255 247 237);">
        @csrf

        <!-- Nome -->
        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus placeholder="Seu nome" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>


        <!-- CPF -->
        <div class="mt-4">
            <x-input-label for="cpf" :value="__('CPF')" />
            <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="cpf" :value="old('cpf')" required placeholder="000.000.000-00" />
            <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
        </div>


        <!-- Data de Nascimento -->
        <div class="mt-4">
            <x-input-label for="datanascimento" :value="__('Data de Nascimento')" />
            <x-text-input id="datanascimento" class="block mt-1 w-full" type="date" name="datanascimento" :value="old('datanascimento')" required />
            <x-input-error :messages="$errors->get('datanascimento')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required placeholder="Seu email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Endereço -->
        <div class="mt-4">
            <x-input-label for="endereco" :value="__('Endereço')" />
            <x-text-input id="endereco" class="block mt-1 w-full" type="text" name="endereco" :value="old('endereco')" required placeholder="Seu endereço" />
            <x-input-error :messages="$errors->get('endereco')" class="mt-2" />
        </div>

        <!-- Telefone -->
        <div class="mt-4">
            <x-input-label for="telefone" :value="__('Telefone')" />
            <x-text-input id="telefone" class="block mt-1 w-full" type="text" name="telefone" :value="old('telefone')" required placeholder="(00) 00000-0000" />
            <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
        </div>

        <!-- Histórico Médico -->
        <div class="mt-4">
            <x-input-label for="historicomedico" :value="__('Histórico Médico (Opcional)')" />
            <textarea id="historicomedico" class="block mt-1 w-full border-gray-300 rounded-md" name="historicomedico" rows="4">{{ old('historicomedico') }}</textarea>
            <x-input-error :messages="$errors->get('historicomedico')" class="mt-2" />
        </div>

        <!-- Senha -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Sua senha" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmação da Senha -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirme sua Senha')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required placeholder="Confirme sua senha" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-6">
            <x-primary-button class="ms-3" style="background-color:rgb(34 197 94); width: 130px; height: 40px;">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
