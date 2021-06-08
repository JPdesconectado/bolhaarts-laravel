@extends('layouts.main')

@section('title', 'BolhaArts')

@section('content')

<div id="search-container" class="col-md-12">
  <h1>Busque um desenho</h1>
  <form action="/" mehotd="GET">
    <input type="text" id ="search" name = "search" class = "form-control" placeholder="Pesquisar...">
    <div class="row"><input type="submit" id = 'btnPesquisar' class="btn btn-primary" value="Pesquisar"></div>
  </form>
</div>
<div id="arts-container" class="col-md-12">
  @if($search)
  <h2>Resultados da pesquisa: {{ $search }}</h2>
  @else
  <h2>Projetos em Andamento</h2>
  <p class ="subtitle">Confira os projetos que estão sendo realizados</p>
  @endif
  <div id="cards-container" class="row">
    @foreach($arts as $art)
    <div class="card col-md-3">
      <img src="/img/arts/{{ $art -> image }}" alt="{{ $art -> title }}">
      <div class="card-body">
        <p class="card-date">{{ date('d/m/Y', strtotime($art -> date)) }}</p>
        <h5 class="card-title">{{ $art -> title }}</h5>
        <p class="card-participants"> {{ $art -> description}}</p>
        <a href="/arts/{{ $art -> id}}" class="btn  btn-primary">Ver Mais</a>
      </div>
    </div>
    @endforeach
    @if (count($arts) == 0 && $search)
      <p>Não foi encontrado projetos com {{ $search }}. <a href="/">Ver Todos!</a> </p>
    @elseif (count($arts) == 0)
      <p>Não há projetos em andamento</p>
    @endif
  </div>
</div>

@endsection