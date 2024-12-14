<div>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Name</th>
                <th>email</th>
                <th>province</th>
                <th>role</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
                <tr>
                    <td>
                        {{$key + 1}}
                    </td>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        {{ $user->role }}
                    </td>
                    <td>
                        {{ $user['province']['Province_name']}}
                    </td>
                    <td>
                        <div class="form-check-success form-check form-switch">
                            <input class="form-check-input status-toggle large-checkbox" type="checkbox"
                                id="flexSwitchCheckCheckedDanger{{ $user->id }}" wire:click="toggleStatus({{ $user->id }})"
                                {{ $user->status ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexSwitchCheckCheckedDanger{{ $user->id }}"></label>

                        </div>
                    </td>
                    <td>

                        <a href="/edit/admin/user/{{$user->id}}" wire:navigate class="btn btn-info"><i
                                class="bx bx-edit"></i></a>
                    </td>

                </tr>
            @endforeach



        </tbody>
        <tfoot>
            <tr>
                <th>Sl</th>
                <th>Name</th>
                <th>email</th>
                <th>province</th>
                <th>role</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>

</div>