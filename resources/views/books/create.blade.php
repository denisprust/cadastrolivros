@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex bd-highlight align-middle">
                    <h3 class="me-auto p-2 bd-highlight align-items-middle text-bold">
                        {{ __('Cadastrar livro') }}
                    </h3>
                    <div class="p-2 bd-highlight">
                        <a class="btn btn-primary" href="{{ route('books.index') }}"> Voltar</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('books.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mt-4">
                                <label for="title">Título do livro:</label>
                                <input type="text" name="title" id="title" maxlength="255"class="form-control">
                            </div>
                            <div class="col-md-4 mt-4">
                                <label for="description">Descrição do livro:</label>
                                <input type="text" name="description" id="description" maxlength="255" class="form-control">
                            </div>
                            <div class="col-md-4 mt-4">
                                <label for="author">Autor do livro:</label>
                                <input type="text" name="author" id="author" maxlength="255" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-md-2 mt-4">
                                <label for="pages">Número de páginas:</label>
                                <input type="number" name="pages" id="pages" maxlength="10" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> Ocorreu alguns problemas ao salvar.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-success float-right">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
