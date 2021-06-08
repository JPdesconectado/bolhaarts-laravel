@extends('layouts.main')

@section('title', $art -> title)

@section('content')

  <div class="col-md-10 offset-md-1">
    <div class="row">
      <div id="image-container" class="col-md-6">
        <img src="/img/arts/{{ $art->image }}" class='img-fluid' alt="{{ $art -> title }}">
      </div>
      <div id="info-container" class="col-md-6">
        <h1>{{ $art -> title }}</h1>
        <p class="art-price"> R$ 100,00</p>
        <p class="art-description"><ion-icon  name="brush"></ion-icon>{{ $art -> description}} </p>
        <a href="#" class="btn btn-primary" id="shop-submit">Comprar</a>
      </div>
    
    </div>

  </div>

@endsection