@extends('admin.dashboard')

@section('content')
    <div class="lg:grid lg:grid-cols-2">
            <div>{{ $item->marca }}</div>
            <div>{{ $item->modelo }}</div>
            <a href="/admin/itens/{{ $item->id }}/edit" class="btn btn-secondary">Editar</a>
            <form action="/admin/itens/{{$item->id}}"method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger" >Delete</button>
              </form>
    </div>
@endsection
