<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unicorner - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container-fluid{
            background-color: #d2e1ff;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            font-weight: bold;
        }

        .navbar-nav .nav-link.active {
            color: #0c0c0a !important;
            background-color: #333;
        }

        .navbar-nav .nav-link:hover {
            color: #0c0c0a;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">Unicorner</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('books.index') }}">Book</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reviews.index') }}">Reviews</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary nav-link" href="{{ route('laporan.pdf') }}">Download</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        @yield('content')
    </div>
</body>
</html>
