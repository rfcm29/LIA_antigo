@extends('admin.dashboard')

@section('content')
    <div>
        <h1>Centros de Custos</h1>
        <br>
        <ul class="list-group">
            @foreach ($data as $item)
            <li class="list-group-item">
                <h2>{{ $item->nome }}</h2>
                <div>Total de Custos associados: {{ $item->custo }}</div>
                <br>
                <!-- <a href="/admin/centroCustos/{{ $item }}" class="btn btn-primary">Ver</a> -->
                <form action="{{route('centroCustos.destroy', $item->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </li>
            @endforeach
        </ul>
        <br>

        <a class="btn btn-success" href="/admin/centroCustos/create">Novo Centro de Custos</a>
    </div>
@endsection
