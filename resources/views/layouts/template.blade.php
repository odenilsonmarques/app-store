<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
    <header class="mb">
        <nav class="navbar fixed-top navbar-expand-sm navbar-dark" style="background-color:#827397">
            <div class="container">
                <a class="navbar-brand" href="{{route('home')}}">
                    Run
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <input type="text" name="person" id="person" class="form-control inputSearch" placeholder="Buscar produto">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-outline search">Buscar</button>
                </div>

                <nav class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">Dashboard</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('categories.index')}}">Categoria</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('products.index')}}">Produto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </svg>
                            </a>
                        </li>
  
                        <li class="nav-item">
                            <form method="POST" action="{{route('logout')}}">
                            @csrf
                                <button type="submit" class="btn btn-outline-light sm">Sair</button>
                            </form>
                        </li> 
                    </ul>
                </nav>
            </div>
        </nav>
    </header>
    <section>
        <div class="container-fluid fixed-top supplements">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <h1><img src="{{asset('assets/img/academia1.png')}}">Creatina</h1>
                    </div>
                    <div class="col-sm-4 text-center">
                        <h1><img src="{{asset('assets/img/mulher.png')}}">Whey protein</h1>
                    </div>
                    <div class="col-sm-4 text-center">
                        <h1><img src="{{asset('assets/img/exercicio.png')}}">Hipercalórico</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section>
        @yield('content')
    </section>

    <footer>
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-sm-12 text-center">
                    <span>2ps.com <br> problemas precisam de solução</span>
                </div>
            </div>
        </div>
    </footer>

    {{-- Esse script está vindo antes por causa da renderizacao do grafico --}}
    {{-- <script src="{{asset('assets/js/chart.umd.js')}}"></script> --}}
    @yield('script')
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/script-mask-inputs.js')}}"></script>
    <script src="{{asset('assets/js/compare-values-input.js')}}"></script>
    <script src="{{asset('assets/js/scriptFormatCoin.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



    
</body>
</html>