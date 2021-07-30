@include('layouts.header', ['title' => 'Forgot Password'])

<div class="container px-4 px-l">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            @include('layouts.alerts')
            <form class="form-signin" method="post" action="{{ route('password.email') }}">
                @csrf
                <input type="email" name="email" :value="old('email')">
                <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('Email Password Reset Link') }}</button>
            </form>
        </div>
    </div>
</div>

@include('layouts.footer')
