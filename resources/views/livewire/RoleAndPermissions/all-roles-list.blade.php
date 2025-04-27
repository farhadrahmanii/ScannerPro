<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Role Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $key => $item)

                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <a href="{{ route('edit.role', $item->id) }}" class="btn btn-info">Edit</a>
                                <button type="button" class="px-4 btn btn-danger" wire:click="deleteRole({{ $item->id }})"
                                    wire:loading.attr="disabled"
                                    onclick="return confirm('Are you sure you want to delete this role?');">
                                    <span wire:loading.remove>Delete</span>
                                    <span wire:loading class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Sl</th>
                        <th>Permission Name</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>