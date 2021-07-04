<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $books = Book::query();

        if ($request->has('title') && trim($request->input('title')) !== '' ) {
            $books = $books->where('title', 'like', '%'.trim($request->title).'%');
        }

        if ($request->has('description') && trim($request->input('description')) !== '' ) {
            $books = $books->where('description', 'like', '%'.trim($request->description).'%');
        }

        if ($request->has('pages') && trim($request->input('pages')) !== '' ) {
            $books = $books->where('pages','=', $request->pages);
        }

        if ($request->has('author') && trim($request->input('author')) !== '' ) {
            $books = $books->where('author', 'like', '%'.trim($request->author).'%');
        }

        $theater = $this->getTheater();

        $books = $books->paginate(5);

        return view('books/index', compact('books', 'request', 'theater'));
    }

    private function getTheater() {
        $response = Http::get('https://api.hgbrasil.com/weather?format=json&user_ip=192.168.1.107');
        return $response->json()['results'];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'author' => 'required',
            'pages' => 'required',
        ]);
    
        Book::create($request->all());
     
        return redirect()->route('books.index')->with('success','Livro criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'author' => 'required',
            'pages' => 'required',
        ]);
    
        $book->update($request->all());
    
        return redirect()->route('books.index')->with('success','Livro atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success','Livro excluído com sucesso!');
    }
}
