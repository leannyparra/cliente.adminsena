<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title', 'AdminSENA')</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
    
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >
    

    <!-- Bootstrap Icons -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        rel="stylesheet"
    >

    @yield('styles')
</head>

<body>
    
        @if (!isset($hideLayout) || !$hideLayout)

            @if (isset($nosotrosLayout) && $nosotrosLayout)

                @include('include.navbar-nosotros')

            @else

                @include('include.navbar')

            @endif

        @endif


    <div class="container-fluid p-0">

        @yield('content')

    </div>


    @if (!isset($hideLayout) || !$hideLayout)
        @include('include.footer')
    @endif


    <!-- Bootstrap JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    </script>

    @yield('scripts')

</body>
</html>