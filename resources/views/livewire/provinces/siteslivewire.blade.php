<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Province Name</th>
                        <th>Site Name</th>
                        <th>Site Manager</th>
                        <th>Site Manager Contact Details</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sites as $key => $site)
                        <tr wire:transition>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $site->province->Province_name }}</td>
                            <td>{{ $site->site_name }}</td>
                            <td>{{ $site->manager->name }}</td>
                            <td>{{ $site->manager->phone }}</td>
                            <td>
                                <button type="button" id="delete" class="btn btn-danger"
                                    wire:click="deleteSite({{ $site->id }})"
                                    wire:confirm="Are you sure you want to delete this post?">
                                    <i class="bx bx-trash"></i>
                                </button>
                                <a href="{{Route('edit.site', $site->id) }}" class="btn btn-info">
                                    <i class="bx bx-edit"></i>
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Sl</th>
                        <th>Province Name</th>
                        <th>Site Name</th>
                        <th>Site Manager</th>
                        <th>Site Manager Contact Details</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    function confirmDelete(id) {
        if (confirm("Are you sure you want to delete this item?")) {
            Livewire.emit('deleteProvince', id);
        }
    }
</script>