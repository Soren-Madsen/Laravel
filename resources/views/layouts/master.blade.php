<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Movies')</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
</head>

<body class="container">

    <header class="my-4 text-center">
       
        @if (file_exists(public_path('img/header.svg')))
            <img src="/img/header.svg" alt="header" style="max-width:100%; height:auto;" />
        @else
            <img src="/img/header.jpg" alt="header" style="max-width:100%; height:auto;" />
        @endif
        <hr>
        @hasSection('header')
            @yield('header')
        @endif
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="mt-5">
        <hr>

        @if (file_exists(public_path('img/footer.svg')))
            <img src="/img/footer.svg" alt="footer" style="max-width:100%; height:auto;" />
        @else
            <img src="/img/footer.jpg" alt="footer" style="max-width:100%; height:auto;" />
        @endif
        @hasSection('footer')
            @yield('footer')
        @endif
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>
