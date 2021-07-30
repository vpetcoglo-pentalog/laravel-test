@include('layouts.header', ['title' => $advert->title])

<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <h2 class="subheading">{{ $advert->subtitle }}</h2>
            <span class="meta">
                Posted by <a href="#!">{{ $advert->user->name }}</a> on {{ $advert->created_at }}
            </span>

            <div >
                {!! $advert->description !!}
            </div>
        </div>

        <hr class="my-4" />
        <h3>Comments</h3>
        <hr class="my-4" />

        @foreach($advert->comments as $comment)
            <div>
                {{ $comment->body }}
                <div>
                    <b><i>by</i> {{ $comment->user->name }}</b>
                    <b><i>on</i> {{ $comment->created_at }}</b>

                    @if(\Illuminate\Support\Facades\Auth::id() === $comment->user_id)
                        <form action="{{ route('comments.delete', ['comment' => $comment->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    @endif
                </div>
            </div>
            <hr class="my-4" />
        @endforeach

        @auth
            <div class="my-5">
                @include('layouts.alerts')
                <form method="post" action="{{ route('adverts.comment', ['advert' => $advert->id]) }}">
                    @csrf
                    <div class="form-floating">
                        <textarea maxlength="255" required name="body" class="form-control is-invalid" id="message" placeholder="Enter your message here..." style="height: 12rem" data-sb-validations="required" data-sb-can-submit="no" spellcheck="false"></textarea>
                        <label for="message">Add comment</label>
                    </div>
                    <br>
                    <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">Send</button>
                </form>
            </div>
        @else
            Please <a href="{{ route('login') }}"><i>Log In</i></a> to leave a comment
        @endauth
    </div>
</article>
@include('layouts.footer')
