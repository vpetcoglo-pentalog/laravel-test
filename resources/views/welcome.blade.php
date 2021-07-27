<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>Jumbotron Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/jumbotron/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body data-new-gr-c-s-check-loaded="14.1022.0" data-gr-ext-installed="">

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="/">LTest</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            @foreach($menu_categories as $category)
                @if(!count($category->children))
                    <li class="nav-item">
                        <a class="nav-link" href="?category={{ $category->id }}">{{ $category->title }}</a>
                    </li>
                @elseif(!$category->parent_id)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $category->title }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($category->children as $subCategory)
                                <a class="dropdown-item" href="?category={{ $subCategory->id }}">{{ $subCategory->title }}</a>
                            @endforeach
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
        @auth
            <ul class="navbar-nav mr-right">
                <li class="nav-item">
                    @if(\Illuminate\Support\Facades\Auth::user()->role === 'admin')
                        <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                    @endif
                </li>
                <li>
                    <a class="nav-link">{{ \Illuminate\Support\Facades\Auth::user()->name }}</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" style="float: right; margin-left: 5px;">
                        @csrf
                        <a href="/logout" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a>
                    </form>
                </li>
            </ul>
        @else
            <ul class="navbar-nav mr-right">
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">Log in</a>
                </li>
                <li class="nav-item">
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    @endif
                </li>
            </ul>
        @endauth
    </div>
</nav>

<main role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Hello, world!</h1>
            <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>
        </div>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            @foreach($adverts as $advert)
                <div class="card col-md-3">
                    <img class="card-img-top" src="https://picsum.photos/350/300?random={{ $advert['id'] }}" alt="{{ $advert['title'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $advert['title'] }} - <span class="badge badge-secondary">{{ $advert->category->title }}</span></h5>
                        <p class="card-text">{{ $advert['description'] }}</p>
                        <p>${{ $advert['price'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <hr>

    </div> <!-- /container -->

</main>

<footer class="container">
    <p>© Company 2017-2018</p>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
<script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>


</body>
</html>
