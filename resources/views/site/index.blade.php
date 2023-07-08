@extends('layouts.template')
@section('title','loja virtual')

@section('content')
    <div class="container">
        <div class="row mt-5">
            @foreach ($products as $product)
                <div class="col-sm-3 mt-5">
                    <div class="card mb-4 shadow">
                        {{-- <img src="{{asset('https://teste-laravel9.s3.sa-east-1.amazonaws.com/' . $product->photo) }}"> --}}
                        <img src="{{url("storage/{$product->photo}")}}" alt="{{$product->name}}" width="120" height="120"><hr>
                        
                        <div class="card-body">
                            <h5 class="card-title">R$ {{$product->sale_price}}</h5>
                            <p class="card-text">{{$product->description}}</p>
                            
                            

                            {{-- <form action="{{route('cart.add')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <button onclick='addToCart()' type="submit" class="btn btn-primary btn-sm">Adicionar ao carrinho</button>
                            </form> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
