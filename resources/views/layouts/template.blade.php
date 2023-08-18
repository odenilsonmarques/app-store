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
    <header class="mb" style="border:1px solid red">
        <nav class="navbar fixed-top navbar-expand-sm navbar-dark">
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
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('categories.index')}}">Categoria</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('products.index')}}">Produto</a>
                        </li>
                        <li>
                            @if (session('cart_quantity') > 0)
                                <a  class="nav-link" href="{{ route('carts.index') }}">Carrinho<span>{{ session('cart_quantity')}}</span></a>
                            @else
                                <a  class="nav-link" href="{{ route('carts.index') }}">Carrinho</a>
                            @endif
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </header>

    <nav class="navbar fixed-top navbar-expand-sm navbar-dark two">
        <div class="container">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Whey protein</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Creatina</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Hipercalórico</a>
                </li>
            </ul>
        </div>
    </nav>

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
    {{-- <script src="{{asset('assets/js/script-quantity-product-in-cart.js')}}"></script> --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



    
</body>
</html>