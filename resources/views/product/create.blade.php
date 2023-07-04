@extends('layouts.template')

@section('title','produto')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-lg-12">
            @if($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card mt-5">
                <div class="card-header">Cadastro de produto</div>
                <div class="card-body">
                    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                        @csrf<!--csrf toquem de segurnça padrao do laravel para envio de requisao-->
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label for="name" class="form-label">Produto</label>
                                <input type="text"  name="name" id="name" class="form-control" value="{{old('name')}}" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label for="name" class="form-label">Categoria</label>
                                <select name="category_id" class="form-select" >
                                    <option value="">Selecione</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category['id']}}" {{ old('category_id') == $category['id'] ? 'selected' : '' }}>{{$category['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 mb-3">
                                <label for="quantity" class="form-label">Quantidade</label>
                                <input type="number"  name="quantity" id="quantity" class="form-control" value="{{old('quantity')}}" >
                            </div>

                            <div class="col-lg-4 mb-3">
                                <label for="confirm_quantity" class="form-label">Confirme a quantidade</label>
                                <input type="number"  name="confirm_quantity"  id="confirm_quantity" class="form-control"  value="{{old('confirm_quantity')}}" >
                            </div>

                            <div class="col-lg-4 mb-3">
                                <label for="minimum_quantity" class="form-label">Quantidade minima</label>
                                <input type="number"  name="minimum_quantity"  id="minimum_quantity" class="form-control" value="{{old('minimum_quantity')}}" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 mb-3">
                                <label for="cost_price" class="form-label">Preço de custo</label>
                                <input type="text"  name="cost_price"  id="cost_price" class="form-control" value="{{old('cost_price')}}"  oninput="formatCoin('cost_price')" >
                            </div>

                            <div class="col-lg-4 mb-3">
                                <label for="sale_price" class="form-label">Preço de venda</label>
                                <input type="text"  name="sale_price"  id="sale_price" class="form-control" value="{{old('sale_price')}}" oninput="formatCoin('sale_price')" >
                            </div>

                            <div class="col-lg-4 mb-3">
                                <label for="photo" class="form-label">Foto</label>
                                <input type="file"  name="photo"  id="photo" class="form-control" >
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label for="description" class="form-label">Descrição</label>
                                <textarea name="description" id="description" cols="" rows="2" class="form-control"  >{{old('description')}}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 mt-5">
                                <button class="btn btn-danger"><a href="#">CANCELAR</a></button>
                                <button type="submit" id="submitBtn" class="btn btn-success">CADASTRAR</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection