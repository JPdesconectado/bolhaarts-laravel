@extends('layouts.main')

@section('title', 'Registrar Desenho')

@section('content')

<div id="art-create-container" class="col-md-6 offset-md-3">
  <h1>Envie seu Desenho</h1>
  <form action="/arts" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title">Desenho:</label>
      <input type="text" class="form-control" id="title" name = "title" placeholder="Nome do Desenho">
    </div>
    <div class="form-group">
      <label for="title">Data do Evento:</label>
      <input type="date" class="form-control" id="date" name = "date">
    </div>
    <div class="form-group">
      <label for="title">Descrição:</label>
      <textarea name = "description" id="description" class="form-control"  placeholder="Descrição do Desenho"></textarea>
    </div>
    <div class="form-group">
      <label for="image">Imagem:</label>
      <input type="file" class="form-control" id="image" name = "image" accept="image/*">
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
    <input type="submit" class="btn btn-primary" value="Postar Desenho">
  </form>
</div> 

@endsection