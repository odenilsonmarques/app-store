@extends('layouts.template')
@section('title','loja virtual')

@section('content')
    <div class="container">
        <div class="row display-product">
            @foreach ($products as $product)
                <div class="col-sm-3 mt-5 product">
                    <a href="{{route('products.show',[$product->uuid])}}" class="redirect">
                        <div class="card shadow">
                            <div class="text-center">
                                <img src="{{url("storage/{$product->photo}")}}" alt="{{$product->name}}" width="120" height="120" class="img-responsive mt-4" >
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">R$ {{$product->sale_price}}</h5>
                                <p class="card-text">{{$product->description}}</p>
                                
                                @if($product->confirm_quantity > 0)
                                    <p id="available">Disponível</p>
                                @else
                                    <p id="not-available">Não disponível</p>
                                @endif
                            </div>
                            <div class="card-footer text-muted text-center">
                                <button class="btn btn-secundary button-buy">
                                    Comprar
                                </button>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
