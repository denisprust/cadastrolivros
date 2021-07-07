@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-12">
            <div class="card text-center">
                {{ $weather['city'] }} -
                {{ $weather['temp'] }}ºC - 
                {{ $weather['description'] }}
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex bd-highlight align-middle">
                    <h3 class="me-auto p-2 bd-highlight align-items-middle text-bold">
                        {{ __('Livros') }}
                    </h3>
                    <div class="p-2 bd-highlight">
                        <a class="btn btn-primary" href="{{ route('books.create') }}">+ Novo livro</a>
                    </div>
                </div>

                <div class="card-body">
                    <form type="POST">
                        <div class="row">
                            <div class="col-md-4 mt-4">
                                <label for="title">Título do livro:</label>
                                <input type="text" name="title" id="title" value="{{$request->title}}" class="form-control">
                            </div>
                            <div class="col-md-4 mt-4">
                                <label for="description">Descrição do livro:</label>
                                <input type="text" name="description" id="description" value="{{$request->description}}" class="form-control">
                            </div>
                            <div class="col-md-4 mt-4">
                                <label for="author">Autor do livro:</label>
                                <input type="text" name="author" id="author" value="{{$request->author}}" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 col-md-2 mt-4">
                                <label for="pages">Número de páginas:</label>
                                <input type="number" name="pages" id="pages" value="{{$request->pages}}" class="form-control">
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-success">Pesquisar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th class="align-middle">Título</th>
                                <th class="align-middle">Descrição</th>
                                <th class="align-middle">Autor</th>
                                <th class="text-center align-middle">Número de páginas</th>
                                <th class="text-center align-middle">Criado em</th>
                                <th class="text-right align-middle"></th>
                            <tr>
                        </thead>
                        <tbody>
                            @if(!empty($books) && $books->count())
                                @foreach($books as $book)
                                    <tr>
                                        <td class="align-middle">{{$book->title}}</td>
                                        <td class="align-middle">{{ \Str::limit($book->description, 50)}}</td>
                                        <td class="align-middle">{{$book->author}}</td>
                                        <td class="text-center align-middle">{{$book->pages}}</td>
                                        <td class="text-center align-middle">{{date('d/m/Y H:i:s', strtotime($book->created_at))}}</td>
                                        <td class="d-flex justify-content-end align-middle">
                                            <form action="{{ route('books.destroy', $book->id) }}" method="POST">   
                                                <a class="btn btn-warning btn-sm" href="{{ route('books.show', $book->id) }}">Ver</a>   
                                                <a class="btn btn-primary btn-sm" href="{{ route('books.edit', $book->id) }}">Editar</a>   
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">Nenhum livro encontrado.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    {!! $books->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
