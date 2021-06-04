<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <form action="/admin/itens" method="POST">
        @csrf
        <div class="form-group">
            <label>Marca</label>
            <input type="text" class="form-control" name="marca" placeholder="" value="{{ old('marca') }}">
            <span class="text-danger">@error('marca'){{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <label>Modelo</label>
            <input type="text" class="form-control" name="modelo" placeholder="" value="{{ old('modelo') }}">
            <span class="text-danger">@error('modelo'){{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <label>Serial Number</label>
            <input type="text" class="form-control" name="serial_number" placeholder="" value="{{ old('serial_number') }}">
            <span class="text-danger">@error('serial_number'){{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <label>Ref IPVC</label>
            <input type="text" class="form-control" name="ref_ipvc" placeholder="" value="{{ old('ref_ipvc') }}">
            <span class="text-danger">@error('ref_ipvc'){{ $message }} @enderror</span>
        </div>
        <div class="form-group">
            <select class="form-select" aria-label="Default select example" name="categoria">
                <option value="1">Audio</option>
                <option value="2">Fotografia</option>
              </select>
        </div>
        <button type="submit" class="btn btn-block btn-primary">Criar Item</button>
    </form>
</body>
</html>
