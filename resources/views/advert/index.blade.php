@include('layouts.header', ['title' => 'My Adverts'])

<div class="container">
    @include('layouts.alerts')
    <nav class="navbar navbar-light bg-light">
        <form class="form-inline" style="display: inherit; width: 100%;">
            <input class="form-control mr-sm-2" name="query" value="{{ app('request')->input('query') }}" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
            <button data-toggle="modal" data-target="#addAdModal" class="btn btn-primary my-2 my-sm-0" type="button">Add new</button>
        </form>
    </nav>
    <div class="row">
        @foreach($adverts as $advert)
            <div class="card col-md-3 col-sm-6 mb-3">
                <img src="{{ $advert->images ?: 'http://beepeers.com/assets/images/commerces/default-image.jpg' }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $advert->title }} - {{ $advert->category->title }}</h5>
                    <div class="card-text">{{ $advert->subtitle }}</div>
                    <div class="card-text">$ {{ $advert->price }}</div>
                    <div>
                        <a href="#" data-toggle="modal" data-target="#editAdModal{{ $advert->id }}" class="btn btn-primary">Edit</a>
                        <a href="#" data-toggle="modal" data-target="#deleteModal{{ $advert->id }}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal fade" id="editAdModal{{ $advert->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="post" enctype="multipart/form-data" action="{{ route('adverts.update', ['advert' => $advert->id]) }}">
                                        <div class="modal-body">
                                            @csrf
                                            @method('put')
                                            <div class="form-group">
                                                <label for="">Title</label>
                                                <input type="text" name="title" class="form-control" value="{{ $advert->title }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Subtitle</label>
                                                <input type="text" name="subtitle" class="form-control" value="{{ $advert->subtitle }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Price</label>
                                                <input type="number" name="price" class="form-control" value="{{ $advert->price }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Category</label>
                                                <select name="category_id" class="form-control" >
                                                    @foreach(\App\Models\Category::all() as $category)
                                                        <option {{ $category->id === $advert->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Image</label>
                                                <img src="{{ $advert->images }}" alt="" width="100">
                                                <input type="file" name="images">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Description</label>
                                                <textarea type="text" name="description" class="description form-control">{{ $advert->description }}</textarea>
                                            </div>
                                            <input type="submit" hidden>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="deleteModal{{ $advert->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="post" action="{{ route('adverts.destroy', ['advert' => $advert->id]) }}">
                                        @method('delete')
                                        @csrf
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this Record?</p>
                                            <p class="text-warning"><small>This action cannot be undone.</small></p>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                            <input type="submit" class="btn btn-danger" value="Delete">
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $adverts->appends(['query' => app('request')->input('query')])->links() }}
    </div>
</div>

<div class="modal fade" id="addAdModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data"  action="{{ route('adverts.store') }}">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="">Subtitle</label>
                        <input type="text" name="subtitle" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" name="price" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id" class="form-control" >
                            @foreach(\App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="images">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea type="text" name="description" class="description form-control"></textarea>
                    </div>
                    <input type="submit" hidden>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replaceClass = 'description';
</script>

@include('layouts.footer')
