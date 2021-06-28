<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LIA</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href = https://code.jquery.com/git/ui/jquery-ui-git.css
         rel = "stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       @include('admin.side_bar')

        <!-- Content Wrapper -->
        <div class="d-flex flex-column">

            <!-- Main Content -->
            <div>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <br>

                    @yield('content')

                    <br>

                </div>

            </div>

        </div>

    </div>

</body>
</html>

