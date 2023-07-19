@extends('layouts.template')
@section('title','loja virtual')

@section('content')
    <div class="container">
            
        <div class="row detail-product">
            
                <div class="col-sm-12 mt-5">
                   
                        <div class="card shadow">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="text-center">
                                        <img src="{{url("storage/{$products->photo}")}}" alt="{{$products->name}}" width="300" height="300" class="zoom-image mt-5">
                                    </div>
                                </div>
    
                                <div class="col-sm-4 mt-5">
                                    <div class="text-left">
                                        <h1>{{$products->name}}</h1>
                                        <h4>R$ {{$products->sale_price}}</h4>
                                        <h5><strong>Categoria:</strong> {{$products->category->name}}</h5>
                                        @if($products->confirm_quantity > 0)
                                            <p id="available">Disponível</p>
                                        @else
                                            <p id="not-available">Não disponível</p>
                                        @endif
                                    </div>
                                    <h5><strong>Características:</strong>{{$products->feature}}</h5><hr>
                                    <h5><strong>Descrição:</strong>{{$products->description}}</h5>
                                </div>

                                <div class="col-sm-4 mt-5">
                                    @if(session('messageCreate'))
                                        <div class="alert alert-success alert-dismissible msg fade show text-center" role="alert">
                                            <strong>{{session('messageCreate')}}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <form action="{{ route('carts.store') }}" method="POST">
                                        @csrf
                                        
                                        <input type="hidden" name="product_id" value="{{$products->id }}">
                                       
                                        <label for="product-quantity" class="form-label">Quantidade</label>
                                        <input type="number" name="product_quantity" id="product-quantity" class="form-control mb-3" value="1" min="1">
                                        <button type="submit" class="btn btn-primary">Adicionar ao Carrinho</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    
                </div>
           
        </div>
    </div>
@endsection
