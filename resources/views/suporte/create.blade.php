@extends('layouts.app')

@section('content')
<h1>Criar Ticket de Suporte</h1>

<form action="{{ route('suportes.store') }}" method="POST">
    @csrf
    <label for="status">Status:</label>
    <input type="text" name="status" required><br>

    <label for="descricao">Descrição:</label>
    <textarea name="descricao" required></textarea><br>

    <button type="submit">Criar Ticket</button>
</form>
@endsection
