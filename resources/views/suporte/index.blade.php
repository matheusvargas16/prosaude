@extends('layouts.app')

@section('content')
<h1>Lista de Suportes</h1>
<a href="{{ route('suportes.create') }}">Criar Novo Ticket</a>
<ul>
    @foreach($suportes as $suporte)
        <li>{{ $suporte->status }} - <a href="{{ route('suporte.show', $suporte->id) }}">Detalhes</a></li>
    @endforeach
</ul>
@endsection
