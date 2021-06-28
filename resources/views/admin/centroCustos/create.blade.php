@extends('admin.dashboard')

@section('content')
    <div>
        <h1>Novo Centro de Custos</h1>
    </div>

    <div>
        <form action="{{ route('centroCustos.store') }}" method="post">
        @csrf
            <div>
                <label for="nome">Nome do Centro de Custos</label>
                <input type="text" name="nome" id="nome" class="form-control">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    </div>
@endsection
