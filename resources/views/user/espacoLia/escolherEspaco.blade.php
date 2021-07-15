@extends('welcome')

@section('content')
    <div class="container">
        <div class="espaco-container">
            @foreach ($espacos as $espaco)
                <div class="posto">
                    <i class='fa fa-desktop' id="posto1"></i>
                    <p>{{ $espaco->descricao }}</p>
                </div>
            @endforeach
        </div>

        <form action="/cancelarReservaEspaco" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">Cancelar</button>
        </form>
    </div>
@endsection
