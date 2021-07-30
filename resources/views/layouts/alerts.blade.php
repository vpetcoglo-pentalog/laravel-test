@if (count($errors) > 0)
    <div class="alert alert-danger container alert alert-success mt-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session()->has('message'))
    <div class="alert alert-success container alert alert-success mt-3">
        {{ session()->get('message') }}
    </div>
@endif
