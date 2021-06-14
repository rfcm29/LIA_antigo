@extends('admin.dashboard')

@section('content')

<div class="container">
    <form action="{{ route('kits.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao">
        </div>
        <div class="form-group">
            <label for="lia_code">Codigo LIA</label>
            <input type="text" name="lia_code" id="lia_code">
        </div>
        <div class="form-group">
            <label for="ref_ipvc">Referência IPVC</label>
            <input type="text" name="ref_ipvc" id="ref_ipvc">
        </div>
        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="text" name="preco" id="preco">
        </div>
        <table id="tableItem" class="table">
            <h1>Itens</h1>
            <thead>
                <input type="button" class="addItem" value="Adicionar Item">
                <input type="button" class="addKit" value="Adicionar Item">
            </thead>
            <tbody>
            </tbody>
        </table>
        <button type="submit">Criar Kit</button>
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
                        '<input type="text" name="itens['+i+'][descricao]">'+
                        '<label for="itens">marca</label>'+
                        '<input type="text" name="itens['+i+'][marca]">'+
                    '</td>'+
                "</tr>";
            $("#tableItem tbody").append(markup);
        });
        $(".addKit").click(function(){
            var markup =
                "<tr>" +
                    '<td>'+
                        '<label for="kits">Código Kit</label>'+
                        '<input type="text" name="kits[]" class="kit" id>'+
                    '</td>'+
                "</tr>";
            $("#tableItem tbody").append(markup);
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

</script>

@endsection
