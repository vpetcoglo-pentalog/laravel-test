@include('layouts.header', ['title' => $filterCategory->title])
<!-- Main Content-->
<div class="container px-4 px-l">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            @foreach($adverts as $advert)
                <!-- Post preview-->
                    <div class="post-preview">
                        <a href="{{ route('adverts.show', ['advert' => $advert['id']]) }}">
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
            {{ $adverts->links() }}
        </div>
    </div>
</div>
@include('layouts.footer')
