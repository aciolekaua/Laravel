<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>@yield('title')</title>
        

        <!-- Fontes do Google  -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

        <!-- Css do Boostrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        
        <!-- Css da Aplicação -->
        <link rel="stylesheet" href="/css/styles.css">
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                    <img id="img" src="/img/33076702_8002366.svg" alt="Logo" class="d-inline-block align-text-top">
                    </a>
                    <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Eventos</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="/events/create">Criar Eventos</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="/">Entrar</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="/">Cadastrar</a>
                        </li>
                    </ul>
                    </div>
                </div>
            </nav>
        </header>
        @yield('content')
        <footer>
            <p>ivici Soluções &copy; 2023</p>
        </footer>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <script src="/js/scripts.js"></script>
    </body>
</html>