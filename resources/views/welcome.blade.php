@extends('layout.main')

@section('title','ivici')

@section('content')
<h1>Oi moreno</h1>
<img src="/img/banner.jpg" alt="">
@if(10 > 15)
    <h2>A condição é true</h2>
@endif

<p>{{ $nome }}</p>

@if($nome == "Pedro")
<p>O nome é Pedro</p>
@elseif($nome == "Kauã")
<p>O nome é {{ $nome }} e, ele tem {{ $idade }} anos, e trabalha como {{ $profissao }}</p>
@else
<p>O Nome não é Pedro</p>
@endif

@for($i = 0; $i < count($arr); $i++)
    <p>{{ $arr[$i] }} - {{$i}}</p>
    @if($i == 2)
    <p>O indice é {{$i}}</p>
    @endif
@endfor

@foreach($nomes as $nome)
    <p>{{ $loop->index }}</p>
    <p>{{ $nome }}</p>
@endforeach

@php 
    $name = "Matuê";
    echo $name;
@endphp

{{-- Eai moreno --}}
@endsection