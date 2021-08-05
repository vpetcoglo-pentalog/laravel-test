@include('layouts.header', ['title' => 'Categories'])
<!-- Main Content-->
<div class="container">
    @include('layouts.alerts')
    <nav class="navbar navbar-light bg-light">
        <form class="form-inline" style="display: inherit; width: 100%;">
            <input class="form-control mr-sm-2" name="query" value="{{ app('request')->input('query') }}" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </nav>
    <div class="row">
        @foreach($categories as $category)
            <div class="card col-md-3 col-sm-6 mb-3">
            <img src="http://beepeers.com/assets/images/commerces/default-image.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $category->title }}</h5>
                    <a href="#" data-toggle="modal" data-target="#editAdModal{{ $category->id }}" class="btn btn-primary">Edit</a>
                    <a href="#" data-toggle="modal" data-target="#deleteAdModal{{ $category->id }}" class="btn btn-danger">Delete</a>
                </div>
            </div>
            <div class="modal fade" id="editAdModal{{ $category->id }}" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Categories manage</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" action="{{ route('categories.update', ['category' => $category->id]) }}">
                            <div class="modal-body">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ $category->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Slug</label>
                                    <input type="text" name="slug" class="form-control" value="{{ $category->slug }}">
                                </div>

                                <div class="form-group">
                                    <label for="">Parent category</label>
                                    <select name="parent_id" class="form-control" >
                                        @foreach(\App\Models\Category::all() as $parent_category)
                                            <option {{ $parent_category->id === $category->parent_id ? 'selected' : '' }} value="{{ $parent_category->id }}">{{ $parent_category->title }}</option>
                                        @endforeach
                                    </select>
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
            <div id="deleteAdModal{{ $category->id }}" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="{{ route('categories.destroy', ['category' => $category->id]) }}">
                            @method('delete')
                            @csrf
                            <div class="modal-header">
                                <h4 class="modal-title">Delete CAtegory</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete these Records?</p>
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
        @endforeach
        {{ $categories->appends(['query' => app('request')->input('query')])->links() }}
    </div>
</div>

@include('layouts.footer')
