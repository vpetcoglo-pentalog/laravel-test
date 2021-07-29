@include('layouts.header')
<!-- Page Header-->
<header class="masthead" style="background-image: url('/assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>{{ $category->title ?: 'Laravel test project' }}</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            @foreach($adverts as $advert)
                <!-- Post preview-->
                    <div class="post-preview">
                        <a href="/adverts/{{ $advert['id'] }}">
                            <h2 class="post-title">{{ $advert['title'] }}</h2>
                            <h3 class="post-subtitle">{{ $advert['subtitle'] }}</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">{{ $advert->user->name }}</a>
                            on {{ $advert->created_at }}
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
            @endforeach


            <!-- Pager-->
            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
        </div>
    </div>
</div>

@include('layouts.footer')
