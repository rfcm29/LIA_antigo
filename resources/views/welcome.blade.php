<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LIA</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @if(session()->has('LoggedUser'))
        <a href="{{ route('auth.logout') }}" class="btn btn-block btn-primary">Log out</a>
    @else
        <a href="{{ route('auth.login') }}" class="btn btn-block btn-primary">Log In</a>
    @endif

</body>
</html>
