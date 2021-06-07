<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LIA</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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

                    @yield('content')

                </div>

            </div>

        </div>

    </div>

</body>
</html>

