<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($provinces as $key => $site)
                        <tr wire:transition>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $site->Province_name }}</td>
                            <td>
                                <a href="javascript:void(0);" id="delete" class="btn btn-danger"
                                    wire:confirm="Are you sure you want to delete {{$site->Province_name}} Provinces?"
                                    wire:click="deleteProvince({{ $site->id }})">
                                    <i class="bx bx-trash"></i>
                                </a>
                                <a href="javascript:void(0);" class="btn btn-info">
                                    <i class="bx bx-edit"></i>
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>