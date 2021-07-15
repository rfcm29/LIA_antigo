@extends('admin.dashboard')

@section('content')

<div class="d-flex flex-column">
    <h1>Criar Kit</h1>
    <br>
    <form action="{{ route('kits.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control">
        </div>
        <div class="form-group">
            <label for="lia_code">Codigo LIA</label>
            <input type="text" name="lia_code" id="lia_code" class="form-control">
        </div>
        <div class="form-group">
            <label for="ref_ipvc">Referência IPVC</label>
            <input type="text" name="ref_ipvc" id="ref_ipvc" class="form-control">
        </div>
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select name="categoria" id="categoria" class="form-control">
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->descricao }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="text" name="preco" id="preco" class="form-control">
        </div>

        <h1>Itens</h1>
        <input type="button" class="addItem btn btn-primary" value="Adicionar Item">
        <input type="button" class="addKit btn btn-primary" value="Adicionar Kit">

        <table id="tableItem" class="table">
            <tbody>
            </tbody>
        </table>
        <table id="tableKit" class="table">
            <tbody>
            </tbody>
        </table>
        <button type="submit" class="btn btn-success">Criar Kit</button>
    </form>
</div>

<script>
    $(document).ready(function(){
        var i = 0;
        $(".addItem").click(function(){
            i++
            var markup =
                "<tr>" +
                    '<td>'+
                        '<label for="itens">Descrição</label>'+
                        '<input type="text" name="itens['+i+'][descricao]" class="form-control"> </td>'+
                        '<td> <label for="itens">Modelo</label>'+
                        '<input type="text" name="itens['+i+'][modelo]" class="form-control"> </td>'+
                        '<td> <label for="itens">Serial Number</label>'+
                        '<input type="text" name="itens['+i+'][serial_number]" class="form-control"> </td>'+
                        '<td><label for="itens">Referencia IPVC</label>'+
                        '<input type="text" name="itens['+i+'][ref_ipvc]" class="form-control">'+
                    '</td>'+
                    '<td>' +
                        '<input type="button" class="btn btn-danger" value="Remover" onclick="deleteRow(this)">' +
                    '</td>'+
                "</tr>";
            $("#tableItem tbody").append(markup);
        });
        $(".addKit").click(function(){
            var markup =
                "<tr>" +
                    '<td>'+
                        '<label for="kits">Código Kit</label>'+
                        '<input type="text" name="kits[]" class="kit form-control">'+
                    '</td>'+
                    '<td>' +
                        '<input type="button" class="btn btn-danger" value="Remover" onclick="deleteRow(this)">' +
                    '</td>'+
                "</tr>";
            $("#tableKit tbody").append(markup);
        });

        $(document).on('DOMSubtreeModified', function (e) {
            const kits = document.getElementsByClassName("kit");
            var sugestoes;
            var codigos = []

            console.log(kits)

            for (let i = 0; i < kits.length; i++) {

            const inputHandler = function(e) {
                const run = true;
                $.ajax({
                    url: "/admin/kits/search",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        kit: kits[i].value,
                    },
                    success:function(data){
                        codigos = []
                        sugestoes = data.success;
                        console.log(sugestoes);
                        sugestoes.forEach(kit => {
                            codigos.push(kit.lia_code)
                        });
                        console.log(codigos)
                        $(".kit").autocomplete({
                            source: codigos
                        })
                    }
                })
            }

            if(kits[i] != null){

                    kits[i].addEventListener('input', inputHandler);
                    kits[i].addEventListener('propertychange', inputHandler);
                }
            }
        });

    });

    function deleteRow(btn){
            var row = btn.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }

</script>

@endsection
