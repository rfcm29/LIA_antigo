@extends('welcome')

@section('content')

<div class="contactos-container">

    <div class="left">
        <form action="mailto:franciscarocha@ipvc.pt?subject=Website Feedback" method="post" enctype="text/plain">
        @csrf
            <h3>Nome</h3>
            <input type="text" name="nome" class="form-control"><br>
            <h3>E-mail</h3>
            <input type="text" name="mail" class="form-control"><br>
            <h3>Mensagem</h3>
            <textarea name="mensagem" cols="30" rows="6" class="form-control"></textarea>
            <!--<input type="text" name="mensagem" size="50" class="form-control">-->
            <br><br>
            <input type="submit" value="Enviar" class="btn btn-primary">        
        </form>
    </div>

    <div class="middle">

    </div>

    <div class="right"> 
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2979.2527424864775!2d-8.848821683766484!3d41.69347927923736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd25c9d271131d39%3A0x7adf1f41800a5ef0!2sEscola%20Superior%20de%20Tecnologia%20e%20Gest%C3%A3o%20-%20Instituto%20Polit%C3%A9cnico%20de%20Viana%20do%20Castelo!5e0!3m2!1spt-PT!2spt!4v1624893949221!5m2!1spt-PT!2spt" 
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

</div>

@endsection