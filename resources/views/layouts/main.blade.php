<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> @yield('title') </title>
        <link rel="shortcut icon" href="/img/icon.png">
        <!-- importando Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <!-- importando Fonte -->    
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet"> 

        <!-- importando CSS -->
        <link rel="stylesheet" href="/css/styles.css">
        <!-- importando JS -->
        <script src="/js/scripts.js"></script>

    </head>
    <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="navbar-brand">
                <img src="/img/menu.png" alt="BolhaArts">
                </a>
                <ul class="navbar-nav">
                <li class="nav-item">
                <a href="/" class="nav-link">Desenhos</a>
                </li>
                <li class="nav-item">
                <a href="/arts/create" class="nav-link">Cadastrar Desenhos</a>
                </li>
                @auth
                <li class="nav-item">
                <a href="/dashboard" class="nav-link">Meus pedidos</a>
                <li class="nav-item">
                <form action="/logout" method="POST">
                    @csrf
                    <a href="/logout" 
                    class="nav-link" onclick="event.preventDefault();
                    this.closest('form').submit();">
                    Sair
                    </a>
                </form>
                @endauth

                @guest
                <li class="nav-item">
                <a href="/login" class="nav-link">Entrar</a>
                </li>
                <li class="nav-item">
                <a href="/register" class="nav-link">Cadastrar</a>
                </li>
                @endguest
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="container-fluid">
            <div class="row">
                @if(session('msg'))
                    <p class="msg"> {{ session('msg') }}</p>
                @endif
                @yield('content')
            </div>
        </div>
    </main>   
    <footer>
    <p>Disconnected Arts &copy; 2021</p>
    </footer>

    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>

    </body>
</html>