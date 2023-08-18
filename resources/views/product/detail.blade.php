@extends('layouts.template')

@section('title','loja virtual')

@section('content')
    <div class="container">
        <div class="row detail-product">
            <div class="col-sm-12 mt-5">
                <div class="card shadow">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="text-center">
                                <img src="{{url("storage/{$products->photo}")}}" alt="{{$products->name}}" width="300" height="300" class="zoom-image mt-5">
                            </div>
                        </div>

                        <div class="col-sm-6 mt-5">
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
                            <h5><strong>Características</strong></h5><p>{{$products->feature}}</p>
                            <h5><strong>Descrição</strong></h5><p>{{$products->description}}</p>
                        </div>

                        <!--form to insert cart product-->
                        <div class="col-sm-3 mt-5">
                            <form action="{{ route('carts.store') }}" method="POST" class="form-quantity">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$products->id}}">
                                
                                <label for="product-quantity" class="form-label">Quantidade</label>
                                <input type="number" name="product_quantity" id="product_quantity" class="form-control mb-3 mr-2" value="1" min="1" max-width=40>

                                <button type="submit" class="btn btn-primary">
                                    Adicionar ao Carrinho
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
