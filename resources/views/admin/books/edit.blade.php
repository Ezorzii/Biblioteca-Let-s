@extends('layouts.app')

@section('content')

    <h1>Adicionar Livros</h1>

     <form action="{{route('admin.books.update', ['book'=>$book->id])}}" method="post">
        @csrf
        <div class="form-group">
            <label>Titulo do livro:</label>
            <input type="text" name="title" class="form-control" value="{{$book->title}}">
        </div>

        <div class="form-group">
            <label>Autor:</label>
            <input type="text" name="author" class="form-control" value="{{$book->author}}">
        </div>

        <div>
            <button type="submit" class="btn btn-lg btn-success">Atualizar Livro</button>
        </div>


    </form>

@endsection
