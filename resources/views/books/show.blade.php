@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex bd-highlight align-middle">
                    <h3 class="me-auto p-2 bd-highlight align-items-middle text-bold">
                        {{ $book->title }}
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
                                <label for="description">Descrição do livro:</label>
                                {{ $book->description }}
                            </div>
                            <div class="col-md-4 mt-4">
                                <label for="author">Autor do livro:</label>
                                {{ $book->author }}
                            </div>
                            <div class="col-sm-3 col-md-2 mt-4">
                                <label for="pages">Número de páginas:</label>
                                {{ $book->pages }}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
