@extends('admin.dashboard')

@section('content')
    <h1>Novo Espaço de Trabalho</h1>
    <br>

    <form action="{{ route('espacoLia.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control">
        </div>
        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="text" name="preco" id="preco" class="form-control">
        </div>

        <h2>Items disponiveis no espaço de trabalho</h2>

        <input type="button" class="addItem btn btn-primary" value="Adicionar Item">

        <table id="tableItem" class="table">
            <tbody>
            </tbody>
        </table>

        <button type="submit" class="btn btn-success">Concluir</button>
    </form>


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
