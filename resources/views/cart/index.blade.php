@extends('layouts.template')

@section('title','Carrinho de compras')

@section('content')

    <div class="container">
        <!--definindo o body para alterar a cor de fundo do mesmo somente nessa página-->
        <body class="page-carrinho">
            <div class="row ">
                <div class="col-sm-8 shadow product-cart">
                    <h1>Carrinho de compras</h1>
    
                    @if(session('messageCreate'))
                        <div class="alert alert-success alert-dismissible msg fade show text-center form-quantity" role="alert">
                            <strong>{{session('messageCreate')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <hr>
                    
                    @if(empty($cart))
                        <div class="alert alert-info">
                            Seu carrinho está vazio. Adicione produtos ao carrinho para continuar.
                        </div>
                    @else
                        @foreach ($products as $product)
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{url("storage/{$product->photo}")}}" alt="{{$product->name}}" width="120" height="120" class="img-responsive mt-4" >
                                    </div>
                                    <div class="col-md-8 text-left">
                                        <div class="card-body text-left">
                                            <h2 class="card-title">{{$product->name}}</h2>
                                            <h4 class="card-title">R$ {{$product->sale_price}}</h4>
                                            <p class="card-text">{{$product->description}}</p>
    
                                            <!-- Exibe quantidade do produto no carrinho -->
                                            @php
                                                $quantityProductInCart = isset($cart[$product->id]) ? $cart[$product->id] : 0;
                                            @endphp
                                                <p>Quantidade: {{ $quantityProductInCart }}</p>
                                        
                                            @if($product->confirm_quantity > 0)
                                                    <p id="available">Em estoque</p>
                                                @else
                                                    <p id="not-available">Não disponível</p>
                                            @endif
    
                                            <div class="d-inline-block">
                                                <form action="{{ route('carts.destroy', $product->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                                </form>
                                            </div>
    
                                            <div class="d-inline-block">
                                                <a href="{{ route('home') }}" title="Continuar comprando" class="btn btn-primary btn-sm">Continuar comprando</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><hr>
                        @endforeach
                    @endif
                </div>
                <div class="col-sm-4">
                    <div class="card mb-3 shadow product-cart" style="max-width: 540px;">
                        <p class="text-center mt-3"><strong>Valor total da compra</strong></p><span class="text-center mb-3 vuleuTotal">R$ {{ number_format($valueTotalShopping, 2, ',', '.') }}</span>
                        <a  class="btn btn-success">Fechar pedido</a>
                    </div>
                </div>
            </div>
        </body>
    </div>
@endsection
