@include('layouts.header', ['title' => 'Settings'])

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item">
                    <img src="{{ $userData->avatar ?? 'https://thumbs.dreamstime.com/z/default-avatar-profile-icon-vector-social-media-user-portrait-176256935.jpg' }}" width="270" alt="" style="max-width: 100%">
                </li>
                <li class="list-group-item">
                    {{ $userData->name }}
                </li>
                <li class="list-group-item">
                    {{ $userData->email }}
                </li>
                <li class="list-group-item">
                    {{ $userData->created_at }}
                </li>
            </ul>
        </div>
        <div class="col-md-7">
            @include('layouts.alerts')

            <h3>Update profile data</h3>
            <form method="post" action="{{ route('settings.update') }}" enctype="multipart/form-data" >
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Avatar</label>
                    <input type="file" name="avatar">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Name*</label>
                    <input type="text" required name="name" class="form-control" value="{{ $userData->name }}" placeholder="Enter name">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Current password</label>
                    <input type="password" name="old_password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>


                <div class="form-group">
                    <label for="exampleInputPassword1">New password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Confirm new password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layouts.footer')
