@extends('layouts.app')

@section('content')

    @if(auth()->user()->is_admin)
        <a href="{{route('admin.books.create')}}" class="btn btn-lg btn-success">Adicionar Livro</a>
    @endif
    <table class="table table-striped" >
    <thead>
        <tr>
            <th>#</th>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Usuário que adicionou</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{$book->id}}</td>
                <td>{{$book->title}}</td>
                <td>{{$book->author}}</td>
                <td>{{$book->user->name}}</td>
                <td>

                    <form action="{{route('book.loan')}}" method="POST">
                        @csrf
                        <input type="hidden" name="book_id" value="{{$book->id}}">
                        @if(!Auth::user()->hasLoan($book->id))
                            <button class="btn btn-sm btn-success">Emprestar</button>
                        @endif

                        @if(auth()->user()->is_admin)
                             <a href="{{route('admin.books.edit', ['book' => $book->id])}}" class="btn btn-sm btn-primary">Editar</a>
                         @endif

                        @if(auth()->user()->is_admin)
                              <a href="{{route('admin.books.destroy', ['book' => $book->id])}}" class="btn btn-sm btn-danger">Remover</a>
                        @endif
                            </form>

                </td>
            </tr>

        @endforeach
    </tbody>
</table>

{{$books->links()}}

@endsection
