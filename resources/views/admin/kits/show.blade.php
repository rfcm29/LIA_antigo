@extends('admin.dashboard')

@section('content')
        <h1> {{ $kit->descricao }}</h1>

        <div class="kits-container">
            <img id="img" src="https://images.unsplash.com/photo-1502920917128-1aa500764cbd?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2250&q=80" height="250px">

            <ul class="list-group">
                <li class="list-group-item">Código LIA: {{ $kit->lia_code }}</li>
                <li class="list-group-item">Categoria: {{ $kit->Categoria->descricao }}</li>
                <li class="list-group-item">Preço: {{ $kit->preco }}€</li>
                <li class="list-group-item">Referência IPVC: {{ $kit->ref_ipvc }}</li>
                <li class="list-group-item">Observações: {{ $kit->observacoes }}</li>
            </ul>

        </div>
        <br>

        @isset($kit->itens[0])
            <div class="row">
                <h2>Itens</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Descrição</th>
                            <th>Modelo</th>
                            <th>Serial Number</th>
                            <th>Ref IPVC</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($kit->itens as $item)
                            <tr>
                                <td scope="row">{{ $item->descricao }}</td>
                                <td>{{ $item->modelo }}</td>
                                <td>{{ $item->serial_number }}</td>
                                <td>{{ $item->ref_ipvc }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endisset

        @isset($kit->kits[0])
            <div>
                <h2>Kits</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Descrição</th>
                            <th>Código LIA</th>
                            <th>Ref IPVC</th>
                            <th>Observações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kit->kits as $item)
                            <tr>
                                <td scope="row">{{ $item->descricao }}</td>
                                <td>{{ $item->lia_code }}</td>
                                <td>{{ $item->ref_ipvc }}</td>
                                <td>{{ $item->observacoes }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endisset

        <div class="btn-container">
            <a class="btn btn-primary" href="/admin/kits/{{$kit->id}}/edit" role="button">Editar</a>
            <form action="{{route('kits.destroy', $kit->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </div>

@endsection
