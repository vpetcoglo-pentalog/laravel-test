<x-app-layout>
    @include('admin.layouts.layout')

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Ads</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addAdModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Ad</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
                        </th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>User</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($adverts as $advert)
                        <tr>
                            <td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
                            </td>
                            <td>{{ $advert['title'] }}</td>
                            <td>{{ $advert['description'] }}</td>
                            <td>{{ $advert['price'] }}</td>
                            <td>{{ $advert->user->email }}</td>
                            <td>
                                <a href="#editAdModal{{ $advert['id'] }}" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                <a href="#deleteAdModal{{ $advert['id'] }}" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>

                                <!-- Edit Modal HTML -->
                                <div id="editAdModal{{ $advert['id'] }}" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="post" action="/adverts/{{ $advert['id'] }}">
                                                @method('put')
                                                @csrf
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Ad</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <input type="text" name="title" value="{{ $advert['title'] }}" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <textarea type="text" name="description" class="form-control" required>{{ $advert['description'] }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Price</label>
                                                        <input type="number" name="price" value="{{ $advert['price'] }}" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                    <input type="submit" class="btn btn-info" value="Save">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delete Modal HTML -->
                                <div id="deleteAdModal{{ $advert['id'] }}" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="post" action="/adverts/{{ $advert['id'] }}">
                                                @method('delete')
                                                @csrf
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Delete Ad</h4>
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
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{ $adverts->links() }}

    </div>

    <!-- Edit Modal HTML -->
    <div id="addAdModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="/adverts">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Add Ad</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" name="description" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="price" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" id="">
                                @foreach($categories as $category)
                                    @if(!count($category->children))
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
