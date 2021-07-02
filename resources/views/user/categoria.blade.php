@extends('welcome')

@section('content')

<div class="container">

<div class="container-btn">
    <button class="btn btn-secondary" id="gridViewBtn" onClick="showGrid()">LIST VIEW</button>
    <!--<button class="btn btn-secondary" id="listViewBtn" onClick="showList()">LIST VIEW</button>-->
</div>


    <div class="row-grid" id="gridView">

    @foreach($kits as $kit)
        <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="card">
        <img class="card-img-top" src="http://placehold.it/250x150">
            <div class="card-body">
                <h4 class="card-title">{{$kit->descricao}}</h4>
                <p class="card-text">INFO DO PRODUTO</p>
                <p class="card-text card-text-preco">{{$kit->preco}}€</p>
                <a class="btn btn-info" href="/kit/{{$kit->id}}">VER DETALHES</a>
            </div>
        </div>
        </div>
    @endforeach

    </div>

    <div class="row" id="listView">

    @foreach($kits as $kit)
        <div class="card w-100">
            <div class="card-body">
                <h4 class="card-title">{{$kit->descricao}}</h4>
                <p class="card-text">INFO DO PRODUTO</p>
                <p class="card-text card-text-preco">{{$kit->preco}}€</p>
                <a class="btn btn-info" href="/kit/{{$kit->id}}">VER DETALHES</a>
            </div>
        </div>
    @endforeach

    </div>

</div>

<script>
    var x = document.getElementById("gridView");
    var y = document.getElementById("listView");
    var btn = document.getElementById("gridViewBtn");

    y.style.display = "none";

    function showGrid() {
        if (x.style.display === "none") {
            x.style.display = "flex";
            y.style.display = "none";
            btn.innerHTML = "LIST VIEW";
        } else {
            x.style.display = "none";
            y.style.display = "flex";
            btn.innerHTML = "GRID VIEW";
        }
    }
</script>
@endsection
