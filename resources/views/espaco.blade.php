@extends('welcome')

@section('content')

<div class="container">
    <h1>Espaços de Trabalho</h1>

    <br>

    <form action="" method="post">
        @csrf
        <div>
            <label for="dataInicio">Data de Inicio</label>
            <input type="date" name="dataInicio" id="dataInicio">
        </div>
        <div>
            <label for="dataFim">Data de Fim</label>
            <input type="date" name="dataFim" id="dataFim">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Escolher Espaço</button>
    </form>


    <div class="espaco-container">
        <div>
            <i class='fa fa-desktop' id="posto1"></i>
            <p>Posto 1</p>
        </div>

        <div>
            <i class='fa fa-desktop' id="posto2"></i>
            <p>Posto 2</p>
        </div>
        
        <div>
            <i class='fa fa-desktop' id="posto3"></i>
            <p>Posto 3</p>
        </div>
        
        <div>
            <i class='fa fa-desktop' id="posto4"></i>
            <p>Posto 4</p>
        </div>
        
    </div>

</div>

@endsection