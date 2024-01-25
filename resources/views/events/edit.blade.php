@extends('layouts.main')

@section('title','Editando '. $event->title)

@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{ $event->title }}</h1>
    <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image" class="form-label">Imagem do Evento</label>
            <input type="file" class="form-control-file" name="image" id="image">
            <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview">
        </div>
        <div class="form-group">
            <label for="title" class="form-label">Evento:</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Nome do Evento" value="{{ $event->title }}" >
        </div>
        <div class="form-group">
            <label for="date" class="form-label">Data do evento:</label>
            <input type="date" class="form-control" name="date" id="date" value="{{ \Illuminate\Support\Carbon::parse($event->date)->format("Y-m-d") }}">
        </div>
        <div class="form-group">
            <label for="city" class="form-label">Cidade:</label>
            <input type="text" class="form-control" name="city" id="city" placeholder="Local do Evento" value="{{ $event->city }}">
        </div>
        <div class="form-group">
            <label for="private" class="form-label">O evento é privdao?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1" {{ $event->private == 1 ? "selected='selected'" : "" }}>Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description" class="form-label">Descricao:</label>
            <textarea class="form-control" name="description" id="description"  placeholder="O que vai acontecer no evento?">{{ $event->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="items" class="form-label">Adicione Itens de infraestrutura:</label>
            <div class="form-group">
                <input type="checkbox" name="items[]" id="" value="Cadeiras">Cadeiras
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" id="" value="Palco">Palco
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" id="" value="Refrigerante Gratis">Refrigerante Gratis
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" id="" value="Open Food">Open Food
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" id="" value="Brindes">Brindes
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Editar Eventos">
    </form>
</div>
@endsection