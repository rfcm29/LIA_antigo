@extends('welcome')

@section('content')
    <div class="container">
        <div class="espaco-container">
            @foreach ($espacos as $espaco)
                <div class="posto">
                    @if(session()->get('reservaEspaco.espacos'))
                        @foreach (session()->get('reservaEspaco.espacos') as $espacoControl)
                            @if ($espaco->id == $espacoControl->id)
                                <form action="/adicionaEspaco/{{ $espaco->id }}" method="post">
                                    @csrf
                                    <button type="send" class="btn btn-posto" autofocus>
                                        <i class='iposto bx bx-desktop'></i>
                                    </button>
                                </form>
                            @else
                                <form action="/adicionaEspaco/{{ $espaco->id }}" method="post">
                                    @csrf
                                    <button type="send" class="btn btn-posto">
                                        <i class='iposto bx bx-desktop'></i>
                                    </button>
                                </form>
                            @endif
                        @endforeach
                    @else
                        <form action="/adicionaEspaco/{{ $espaco->id }}" method="post">
                            @csrf
                            <button type="send" class="btn btn-posto">
                                <i class='iposto bx bx-desktop'></i>
                            </button>
                        </form>
                    @endisset

                    <p>{{ $espaco->descricao }}</p>
                </div>
            @endforeach
        </div>

        <form action="/cancelarReservaEspaco" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">Cancelar</button>
        </form>
        <form action="/confirmarReservaEspaco" method="post">
            @csrf
            <button type="submit" class="btn btn-success">Continuar</button>
        </form>
    </div>
@endsection
