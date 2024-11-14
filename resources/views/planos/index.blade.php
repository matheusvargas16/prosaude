@extends('layouts.app')

@section('content')
<h1>Planos de Saúde</h1>
<ul>
    @foreach($planos as $plano)
        <li>{{ $plano->nome }} - {{ $plano->preco }} - <a href="{{ route('planos.show', $plano->id) }}">Detalhes</a></li>
    @endforeach
</ul>
@endsection
