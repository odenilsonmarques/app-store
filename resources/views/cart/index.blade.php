@extends('layouts.template')

@section('title','carrinho de compra')

@section('content')

    <div class="container">
        <div class="row product-cart">
            <div class="col-sm-8 shadow">
                <h1>Carrinho de compras</h1><hr>
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
                                
                                    @if($product->confirm_quantity > 0)
                                            <p id="available">Em estoque</p>
                                        @else
                                            <p id="not-available">Não disponível</p>
                                    @endif
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div><hr>
                @endforeach
            </div>
            <div class="col-sm-4 ">
                <div class="card mb-3 shadow" style="max-width: 540px;">
                    <h3 class="text-center">teste</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
