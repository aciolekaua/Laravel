@extends('layout.main')

@section('title','Produtos')

@section('content')
    <h1>Olá, está é a tela de produtos</h1>
    @if($busca != '')
        <p>O usuario está buscando por: {{ $busca }}</p>
    @endif
@endsection