<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Permission Name</th>
                        <th>Group Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $key => $item)

                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->group_name}}</td>
                            <td>
                                <a href="#" class="btn btn-info">Edit</a>
                                <a href="#" class="btn btn-danger" id="delete">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                <tfoot>
                    <tr>
                        <th>Sl</th>
                        <th>Permission Name</th>
                        <th>Group Name</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>