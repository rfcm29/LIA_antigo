@extends('admin.dashboard')

@section('content')
    <div class="container">
        <form action="/admin/itens" method="POST">
            @csrf
            <div class="form-group">
                <label>Marca</label>
                <input type="text" class="form-control" name="marca" placeholder="" value="{{ old('marca') }}">
                <span id="marca" class="text-danger" name="marca">@error('marca') Campo obrigatório @enderror</span>
            </div>
            <div class="form-group">
                <label>Modelo</label>
                <input type="text" class="form-control" name="modelo" placeholder="" value="{{ old('modelo') }}">
                <span class="text-danger">@error('modelo') Campo obrigatório @enderror</span>
            </div>
            <div class="form-group">
                <label>Serial Number</label>
                <input type="text" class="form-control" name="serial_number" placeholder="" value="{{ old('serial_number') }}">
                <span class="text-danger">@error('serial_number') Campo obrigatório @enderror</span>
            </div>
            <div class="form-group">
                <label>Ref IPVC</label>
                <input type="text" class="form-control" name="ref_ipvc" placeholder="" value="{{ old('ref_ipvc') }}">
                <span class="text-danger">@error('ref_ipvc') Campo obrigatório @enderror</span>
            </div>
            <div class="form-group">
                <select class="form-control" aria-label="Default select example" name="categoria">
                    <option></option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->descricao }}</option>
                    @endforeach
                  </select>
                  <span class="text-danger">@error('categoria')Campo obrigatório @enderror</span>
            </div>
            <button type="submit" class="btn btn-block btn-primary">Criar Item</button>
        </form>
    </div>
@endsection
