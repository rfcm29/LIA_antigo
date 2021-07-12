@extends('admin.dashboard')

@section('content')
    <div>
        <h1>Utilizador: {{ $user->name }}</h1>

        <br>

        <ul class="list-group">
            <li class="list-group-item">
                Email: {{ $user->email }}
            </li>
            <li class="list-group-item">
                Tipo de Utilizador: {{ $userType->descricao }}
            </li>
            <li class="list-group-item">
                Telefone: {{ $user->telefone }}
            </li >
        </ul>

        <br>

        <a href="" class="btn btn-primary">Editar</a>
        @if (Auth::user() != $user)
            <form action="{{route('users.destroy', $user->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Apagar Utilizador</button>
            </form>
        @endif
    </div>
@endsection
