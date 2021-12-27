@extends('layouts.app')

@section('content')

    <h1>Adicionar Livros</h1>

    <form action="{{route('admin.books.book')}}" method="POST">
        @csrf

        <div class="form-group">
            <label>Titulo do livro:</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}">

            @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label>Autor:</label>
            <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" value="{{old('author')}}">

            @error('author')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div>
            <button type="submit" class="btn btn-lg btn-success">Adicionar Livro</button>
        </div>


    </form>

@endsection
