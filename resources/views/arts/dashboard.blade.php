@extends('layouts.main')

@section('title', 'DashBoard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Pedidos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-arts-container">
    @if(count($arts) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope='col'>#</th>
                <th scope='col'>Título</th>
                <th scope='col'>Descrição</th>
                <th scope='col'>Preço</th>
            </tr>
        </thead>   
        <tbody>
            @foreach($arts as $art)
                <tr>
                    <th scope='row'>{{ $loop->index+1 }}</th>
                    <td><a href="/arts/{{ $art->id }}"> {{  $art->title }}</a></td>
                    <td>0</td>
                    <td>
                    <a href="/arts/edit/{{ $art->id}}" class="btn btn-info"><ion-icon name="create"></ion-icon> Editar</a>
                    <form action="/arts/{{ $art->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                        <ion-icon name="trash"></ion-icon> Deletar</button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>    
    @else
    <p>Nenhum pedido realizado, que tal fazer um <a href="/arts/create">agora?</a></p>
    @endif
</div>
@endsection