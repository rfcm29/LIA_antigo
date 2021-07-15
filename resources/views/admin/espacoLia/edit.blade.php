@extends('admin.dashboard')

@section('content')
<div class="container">
    <h1>Editar Espaço de Trabalho</h1>
    <br>

    <form action="/admin/espacoLia/{{ $espaco->id }}" method="post">
        @method('PATCH')
        @csrf

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="{{ $espaco->descricao }}">
        </div>
        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="text" name="preco" id="preco" class="form-control" value="{{ $espaco->preco }}">
        </div>

        <h2>Items disponiveis no espaço de trabalho</h2>

        <input type="button" class="addItem btn btn-primary" value="Adicionar Item">

        <table id="tableItem" class="table">
            <tbody>
                @foreach ($espaco->items as $item)
                    <tr>
                        <td>
                            <label for="itemEdit">Descrição do Item</label>
                            <input type="text" name="editarItems[{{ $item->id }}]" class="form-control" value="{{ $item->descricao }}">
                        </td>
                        <td>
                            <input type="button" class="btn btn-danger" value="Remover" onclick="deleteRow(this)">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-success">Concluir</button>
    </form>
</div>

<script>
    $(document).ready(function(){
            $(".addItem").click(function(){
                var markup =
                    "<tr>" +
                        '<td>'+
                            '<label for="items">Descrição do Item</label>'+
                            '<input type="text" name="items[]" class="kit form-control">'+
                        '</td>'+
                        '<td>' +
                            '<input type="button" class="btn btn-danger" value="Remover" onclick="deleteRow(this)">' +
                        '</td>'+
                    "</tr>";
                $("#tableItem tbody").append(markup);
            });
        });

    function deleteRow(btn){
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }
</script>

@endsection
