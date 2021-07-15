@extends('user.perfil.perfil')

@section('content')
    <div class="container perfil">

        <a href="{{ route('home') }}">
            <img src="{{url('/images/logo_1.png')}}" width="30%">
        </a>

        <a href="/reservas/{{ $user->id }}" class="btn btn-primary">Ver Reservas</a>

        <form action="">
            @csrf
            <h3>Nome</h3>
            <input type="text" id="nome" name="nome" value="{{$user->name}}" class="form-control">
            <h3>Email</h3>
            <input type="text" id="email" name="email" value="{{$user->email}}" class="form-control">
            <h3>Password</h3>
            <input type="password" class="form-control" name="password" placeholder="Enter password" class="form-control">
            <h3>Confirmar Password</h3>
            <input type="password" class="form-control" name="password" placeholder="Enter password" class="form-control">
            <h3>Telemóvel</h3>
            <input type="text" id="telemovel" name="telemovel" value="{{$user->telefone}}" class="form-control">
            <h3>Centro de Custos</h3>
            <select id="centro_custos" name="centro_custos" class="form-control">
                <option value="ECGM">ECGM</option>
                <option value="EI">EI</option>
                <option value="DP">DP</option>
            </select>
            <input type="submit" value="ALTERAR" class="btn btn-primary" id="btnPerfil">
        </form>

        <br><br>

    </div>
@endsection
