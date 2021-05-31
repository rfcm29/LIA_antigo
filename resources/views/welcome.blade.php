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
    <a href="{{ route('auth.login') }}" class="btn btn-block btn-primary">Log In</a>

    <nav class="navbar navbar-expand-sm navbar-light bg-light" data-toggle="affix">
        <div class="mx-auto d-sm-flex d-block flex-sm-nowrap">
            <a class="navbar-brand" href="#">
                <img src="images/logo_1.png" width="70">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="navbarsExample11">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">CAT 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">CAT 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">CAT 3</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">CAT 4</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">CONTACTOS</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<div class="wrapper">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="card">
                        <a class="img-card" href="https://elearning.ipvc.pt/">
                        <img src="images/camera.jpg" width="100%"/> CATEGORIA 1
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="card">
                        <a class="img-card" href="https://elearning.ipvc.pt/">
                        <img src="images/camera.jpg" width="100%" /> CATEGORIA 2
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="card">
                        <a class="img-card" href="https://elearning.ipvc.pt/">
                        <img src="images/camera.jpg" width="100%" /> CATEGORIA 3
                        </a>
                    </div>
                </div>
            </div> <br>
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="card">
                        <a class="img-card" href="https://elearning.ipvc.pt/">
                        <img src="images/camera.jpg" width="100%"/> CATEGORIA 4
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="card">
                        <a class="img-card" href="https://elearning.ipvc.pt/">
                        <img src="images/camera.jpg" width="100%" /> CATEGORIA 5
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="card">
                        <a class="img-card" href="https://elearning.ipvc.pt/">
                        <img src="images/camera.jpg" width="100%" /> CATEGORIA 6
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
