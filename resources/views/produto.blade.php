@extends('layout.main')

@section('title','Produto')

@section('content')

    @if($id != null)
        <p>Exibindo o produto id: {{ $id }}</p>
    @endif
@endsection