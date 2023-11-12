<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Hotel admin panel</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/admin/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/admin/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/loading.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.js') }}"></script>
</head>

<body>

    <x-admin.header></x-admin.header>

    <div class="container-fluid loading-container">

        <div class="row">
            <x-admin.sidebar></x-admin.sidebar>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content-bg content-font">
                @yield('content')
            </main>
        </div>
    </div>
    <section id="loading">
        <div id="loading-content">
            <div class="lds-hourglass"></div>
        </div>
    </section>

    <script src="{{ asset('js/admin/bootstrap.bundle.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/admin/dashboard.js') }}"></script>
    <script src="{{ asset('js/admin/loading-indicator.js') }}"></script>
    @stack('js')
</body>

</html>
