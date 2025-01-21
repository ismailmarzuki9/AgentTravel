<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Travel Agent')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

</head>
<body>

    <div class="">
        @yield('content')
    </div>

    <footer class="bg-light py-3 m-4">
        <p class="mb-0 text-center ">&copy; {{ date('Y') }} Travel Agent. Batamtripwheels.com.</p>
        <div class="row">
            <ul class="col-3 text-start lh-1 m-0 p-1">
                <h6 class="lh-1">Twitter, Inc.</h6>
                <h6 class="lh-1"> 1355 Market St, Suite 900 </h6>
                <h6 class="lh-1"> San Francisco, CA 94103 </h6>
                <h6 class="lh-1">(123) 456-7890 </h6>
                <h6 class="lh-1">Full Name first.last@example.com </h6>
            </ul>
        </div>

    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
