@extends('admin.dashboard')

@section('content')
    <div class="container">
        <form action="/admin/itens/{{ $item->id }}" method="POST">
            @method('PATCH')
            @csrf
            <div>
                <label for="marca">Marca</label>
                <input type="text" name="marca" value="{{ $item->marca}}">
                <span class="text-danger">@error('marca')Campo obrigatório @enderror</span>

            </div>
            <div>
                <label for="modelo">Modelo</label>
                <input type="text" name="modelo" value="{{ $item->modelo}}">
                <span class="text-danger">@error('modelo')Campo obrigatório @enderror</span>
            </div>
            <div>
                <label for="descricao">Descrição</label>
                <input type="text" name="descricao" value="{{ $item->descricao}}">
            </div>
            <div>
                <label for="observacoes">Observações</label>
                <input type="text" name="observacoes" value="{{ $item->odservacoes}}">
            </div>
            <div>
                <label for="preco">Preço</label>
                <input type="text" name="preco" value="{{ $item->preco}}">
            </div>
            <button type="submit">Concluir</button>
        </form>
    </div>
@endsection
