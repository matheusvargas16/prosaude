@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
    <h1 class="text-4xl font-semibold text-teal-600 mb-8 text-center">Detalhes do Ticket</h1>

    <!-- Exibição de Ticket -->
    <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200 mb-8">
        <!-- Título do Ticket -->
        <h2 class="text-2xl font-semibold text-teal-700 mb-4">{{ $suporte->titulo }}</h2>

        <!-- Status do Ticket -->
        <p class="text-lg"><strong>Status:</strong> 
            <span class="px-3 py-1 rounded-full text-white
                @if($suporte->status == 'Aberto') bg-teal-500
                @elseif($suporte->status == 'Em andamento') bg-yellow-500
                @elseif($suporte->status == 'Fechado') bg-gray-500 @endif">
                {{ $suporte->status }}
            </span>
        </p>

        <!-- Mensagem do Ticket -->
        <p class="text-lg mt-4"><strong>Mensagem:</strong></p>
        <p class="text-lg text-gray-600">{{ $suporte->mensagem }}</p>

        <!-- Ações do Ticket -->
        <div class="mt-6 flex justify-center gap-4">
            <a href="{{ route('suporte.index') }}" class="bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-600 transition duration-300">
                Voltar para Meus Tickets
            </a>

            <!-- Botão para Editar Ticket (caso necessário) -->
            <a href="{{ route('suporte.edit', $suporte->id) }}" class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600 transition duration-300">
                Editar Ticket
            </a>
        </div>
    </div>
</div>
@endsection
