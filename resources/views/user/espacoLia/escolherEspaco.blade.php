@extends('welcome')

@section('content')
    <div class="container">
        <div class="espaco-container">
            
            <div class="posto">
                <button class="btn btn-posto">
                    <i class='iposto bx bx-desktop' id="posto1"></i>
                </button>
                
                <p>Posto 1</p>
            </div>

            <div class="posto">
                <button class="btn btn-posto">
                    <i class='iposto bx bx-desktop' id="posto2"></i>
                </button>
                
                <p>Posto 2</p>
            </div>

            <div class="posto">
                <button class="btn btn-posto">
                    <i class='iposto bx bx-desktop' id="posto3"></i>
                </button>
                
                <p>Posto 3</p>
            </div>

            <div class="posto">
                <button class="btn btn-posto">
                    <i class='iposto bx bx-desktop' id="posto4"></i>
                </button>
                
                <p>Posto 4</p>
            </div>
        </div>

        <form action="/cancelarReservaEspaco" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">Cancelar</button>
        </form>
    </div>
@endsection
