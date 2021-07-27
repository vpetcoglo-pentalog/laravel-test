<x-app-layout>
    @include('admin.layouts.layout')

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Categories</b></h2>
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
                        <th>Parent category</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($categories as $category)
                        <tr>
                            <td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
                            </td>
                            <td>{{ $category->title }}</td>
                            <td>
                                @foreach($categories as $parent_category)
                                    @if($parent_category->id === $category->parent_id)
                                        {{ $parent_category->title }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <a href="#editAdModal{{ $category->id }}" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                <a href="#deleteAdModal{{ $category->id }}" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>

                                <!-- Edit Modal HTML -->
                                <div id="editAdModal{{ $category->id }}" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="post" action="/categories/{{ $category->id }}">
                                                @method('put')
                                                @csrf
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit Category</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <input type="text" name="title" value="{{ $category->title }}" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Parent category</label>
                                                        <select name="parent_id" id="">
                                                            <option value="">-</option>
                                                            @foreach($categories as $parent_category)
                                                                @if ($parent_category->id !== $category->id && !$parent_category->parent_id)
                                                                    <option value="{{ $parent_category->id }}" {{ $parent_category->id === $category->parent_id ? 'selected' : '' }}>{{ $parent_category->title }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
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
                                <div id="deleteAdModal{{ $category->id }}" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="post" action="/categories/{{ $category->id }}">
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
        {{ $categories->links() }}
    </div>

    <!-- Edit Modal HTML -->
    <div id="addAdModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="/categories">
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
                        @if(count($categories))
                            <div class="form-group">
                                <label>Parent Category</label>
                                <select name="parent_id" id="">
                                    <option value="">-</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
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
