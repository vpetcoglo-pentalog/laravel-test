<x-app-layout>
    @include('admin.layouts.layout')

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Users</b></h2>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>

                            <td>
                                @if(\Illuminate\Support\Facades\Auth::id() !== $user->id)
                                    <a href="#deleteAdModal{{ $user->id }}" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                    <!-- Delete Modal HTML -->
                                    <div id="deleteAdModal{{ $user->id }}" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form method="post" action="/users/{{ $user->id }}">
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
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{ $users->links() }}

    </div>
</x-app-layout>
