@extends('welcome')

@section('content')

<div class="container">

<div class="container-btn">
    <button class="btn btn-secondary" id="gridViewBtn">GRID VIEW</button>
    <button class="btn btn-secondary" id="listViewBtn">LIST VIEW</button>
</div>


    <div class="row" id="gridView">

    @foreach($kits as $kit)
        <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="card">
        <img class="card-img-top" src="http://placehold.it/250x150">
            <div class="card-body">
                <h4 class="card-title">{{$kit->descricao}}</h4>
                <p class="card-text">INFO DO PRODUTO</p>
                <p class="card-text card-text-preco">{{$kit->preco}}€</p>
                <button class="btn-info">VER DETALHES</button>
            </div>
        </div>
        </div>
    @endforeach

    </div>

<!--
    <div class="row" id="listView">

        <div class="card w-100">
            <div class="card-body">
                <h4 class="card-title">NOME DO PRODUTO</h4>
                <p class="card-text">INFO DO PRODUTO</p>
                <button class="btn-info">VER DETALHES</button>
            </div>
        </div>

        <div class="card w-100">
            <div class="card-body">
                <h4 class="card-title">NOME DO PRODUTO</h4>
                <p class="card-text">INFO DO PRODUTO</p>
                <button class="btn-info">VER DETALHES</button>
            </div>
        </div>

        <div class="card w-100">
            <div class="card-body">
                <h4 class="card-title">NOME DO PRODUTO</h4>
                <p class="card-text">INFO DO PRODUTO</p>
                <button class="btn-info">VER DETALHES</button>
            </div>
        </div>

        <div class="card w-100">
            <div class="card-body">
                <h4 class="card-title">NOME DO PRODUTO</h4>
                <p class="card-text">INFO DO PRODUTO</p>
                <button class="btn-info">VER DETALHES</button>
            </div>
        </div>

        <div class="card w-100">
            <div class="card-body">
                <h4 class="card-title">NOME DO PRODUTO</h4>
                <p class="card-text">INFO DO PRODUTO</p>
                <button class="btn-info">VER DETALHES</button>
            </div>
        </div>

        <div class="card w-100">
            <div class="card-body">
                <h4 class="card-title">NOME DO PRODUTO</h4>
                <p class="card-text">INFO DO PRODUTO</p>
                <button class="btn-info">VER DETALHES</button>
            </div>
        </div>
    </div>

-->

</div>

@endsection