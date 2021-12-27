<?php

namespace App\Http\Controllers\Admin;

use App\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function index()
    {
        $books = \App\Book::paginate(10);

        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
            $users =  \App\User::all(['id', 'name']);

            return view('admin.books.create', compact('users'));
    }

        public function book(BookRequest $request)
        {
            $data = $request->all();
            $data['user_id'] = auth()->user()->id;
           $book = Book::create($data);

            flash('Livro Atualizado com sucesso')->success();
            return redirect()->route('admin.books.index');

        }

        public function edit($book)
        {
            $book = \App\Book::find($book);

            return view('admin.books.edit', compact('book'));
        }

        public function update(BookRequest $request, $book)
        {
            $data = $request->all();

            $book = \App\Book::find($book);
            $book->update($data);

           flash('Livro Atualizado com sucesso')->success();
           return redirect()->route('admin.books.index');
        }

        public function destroy($book)
        {
            $book = \App\Book::find($book);
            $book->delete();

            flash('Livro Removido com sucesso')->success();
            return redirect()->route('admin.books.index');

        }

}