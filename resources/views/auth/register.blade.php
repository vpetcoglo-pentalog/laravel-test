@include('../layouts.header', ['title' => 'Sign Up'])

<div class="container px-4 px-l">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            @include('layouts.alerts')
            <form class="form-signin" method="post" action="{{ route('register') }}">
                @csrf
                <h1 class="h3 mb-3 font-weight-normal">Sign Up</h1>
                <label for="inputEmail" class="sr-only">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" required="" autofocus="">
                <br>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
                <br>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="">
                <br>
                <label for="inputPassword" class="sr-only">Confirm Password</label>
                <input type="password" name="password_confirmation" id="inputPassword" class="form-control" placeholder="Confirm Password" required="">
                <br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
            </form>
        </div>
    </div>
</div>

@include('../layouts.footer')
