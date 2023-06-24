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
        <nav class="navbar fixed-top navbar-expand-sm navbar-dark" style="background-color:#94AF9F">
            <div class="container">
                <a class="navbar-brand" href="#">
                    Loja virtual
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <nav class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Categoria</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Produto</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </header>

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