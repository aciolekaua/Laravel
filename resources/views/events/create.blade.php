@extends('layout.main')

@section('title','Criar Eventos')

@section('content')
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie o seu evento</h1>
    <form action="/events" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image" class="form-label">Imagem do Evento</label>
            <input type="file" class="form-control-file" name="image" id="image">
        </div>
        <div class="form-group">
            <label for="title" class="form-label">Evento:</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Nome do Evento">
        </div>
        <div class="form-group">
            <label for="city" class="form-label">Cidade:</label>
            <input type="text" class="form-control" name="city" id="city" placeholder="Local do Evento">
        </div>
        <div class="form-group">
            <label for="private" class="form-label">O evento é privdao?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description" class="form-label">Descricao:</label>
            <textarea class="form-control" name="description" id="description"  placeholder="O que vai acontecer no evento?"></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Criar Eventos">
    </form>
</div>
@endsection