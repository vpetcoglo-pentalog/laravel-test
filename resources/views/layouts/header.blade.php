<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Clean Blog - Start Bootstrap Theme</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/css/styles.css" rel="stylesheet" />
</head>
<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ route('home') }}">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link px-lg-3 py-3 py-lg-4 dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Categories</a>
                    <div class="dropdown-menu">
                        @foreach($menu_categories as $category)
                            <a class="dropdown-item" href="{{ route('categories.filter', ['category' => $category->slug]) }}">{{ $category->title }}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="#">About</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="#">Sample Post</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="#">Contact</a></li>

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link px-lg-3 py-3 py-lg-4 dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                        <div class="dropdown-menu">
                            @if(Auth::user()->role === 'admin')
                                    <a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a>
                            @endif
                            <a class="dropdown-item" href="#" onclick="getElementById('logout-form').submit()">
                                {{ __('Log Out') }}
                            </a>
                        </div>
                    </li>

                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                    </form>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link px-lg-3 py-3 py-lg-4">Log in</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-link px-lg-3 py-3 py-lg-4">Register</a>
                        @endif
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<header class="masthead" style="background-image: url('/assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>{{ $title ?: 'Laravel test project' }}</h1>
                </div>
            </div>
        </div>
    </div>
</header>
