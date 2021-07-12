@extends('welcome')

@section('content')

<div class="container">

    session()->get('reserva.user')

    @foreach (session()->get('reserva.kits') as $kit)

    @endforeach

</div>

@endsection
