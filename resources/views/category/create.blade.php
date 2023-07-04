@extends('layouts.template')

@section('title','categoria')

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
                <div class="card-header">Cadastro de categoria</div>
                <div class="card-body">
                    <form action="{{ route('categories.store')}}" method="post">
                        @csrf<!--csrf toquem de segurnça padrao do laravel para envio de requisao-->
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label for="name" class="form-label">Nome da categoria</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <label for="description" class="form-label">Descrição</label>
                                <textarea name="description" id="description" cols="" rows="2" class="form-control" required>{{old('description')}}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mt-5">
                                <button class="btn btn-danger"><a href="#">CANCELAR</a></button>
                                <button type="submit" class="btn btn-success">CADASTRAR</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection