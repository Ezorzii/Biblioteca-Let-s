@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12">
            <h2>Meus Empréstimos</h2>
        </div>
    </div>

    <table class="table table-striped" >
        <thead>
        <tr>
            <th>#</th>
            <th>Livro</th>
            <th>Data de Retorno</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        @foreach($loans as $loan)
            <tr>
                <td>{{$loan->id}}</td>
                <td>{{$loan->book->title}}</td>
                <td>{{$loan->return_date}}</td>
                <td>
                    <form action="{{route('loan.devolution', $loan->id)}}" method="POST">
                        @csrf
                        @if(!$loan->devolution)
                        <button class="btn btn-sm btn-primary">Devolver</button>
                            @endif
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>



@endsection
