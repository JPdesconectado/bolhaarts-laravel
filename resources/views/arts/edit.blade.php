@extends('layouts.main')

@section('title', 'Editar Informação: ' . $art->title)

@section('content')

<div id="art-create-container" class="col-md-6 offset-md-3">
  <h1>Edite seu Desenho</h1>
  <form action="/arts/update/{{ $art->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="title">Desenho:</label>
      <input  type="text" 
              class="form-control" 
              id="title" 
              name = "title" 
              placeholder="Nome do Desenho" 
              value = "{{ $art -> title }}">

    </div>
    <div class="form-group">
      <label for="title">Data do Evento:</label>
      <input  type="date" 
              class="form-control" 
              id="date" name = "date"
              value = "{{ $art -> date -> format('Y-m-d') }}">
    </div>
    <div class="form-group">
      <label for="title">Descrição:</label>
      <textarea   name = "description" 
                  id="description" 
                  class="form-control"  
                  placeholder="Descrição do Desenho">"{{ $art -> description }}"</textarea>
    </div>
    <div class="form-group">
      <label for="image">Imagem:</label>
      <input type="file" class="form-control" id="image" name = "image" accept="image/*">
      <img src="/img/arts/{{ $art -> image }}" alt="{{ $art -> title }}" class="img-preview">
    </div>
    
    <div class="form-group">
      <label for="title">Adicione os Extras:</label>
      <div class="form-group">
        <input type="checkbox" name="items[]" value="Lineart"> Lineart
      </div>
      <div class="form-group">
        <input type="checkbox" name="items[]" value="Colorido"> Colorido
      </div>
      <div class="form-group">
        <input type="checkbox" name="items[]" value="CorpoInteiro"> Corpo Inteiro
      </div>
    </div>
    <input type="submit" class="btn btn-primary" value="Editar Desenho">
  </form>
</div> 

@endsection