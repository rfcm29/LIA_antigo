@extends('admin.dashboard')

@section('content')
    <div>
        <h1>Utilizadores</h1>
        <br>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Tipo de utilizador</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td scope="row">{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    @foreach ($userType as $type)
                        @if ($type->id == $user->user_type)
                            <td>{{ $type->descricao }}</td>
                        @endif
                    @endforeach
                    <th>
                        <a href="/admin/users/{{ $user->id }}" class="btn btn-outline-primary">Ver</a>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
