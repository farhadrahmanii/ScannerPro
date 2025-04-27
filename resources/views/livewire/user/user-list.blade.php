<div>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Name</th>
                <th>email</th>
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
                        <label class="inline-flex items-center me-5 cursor-pointer">
                            <input type="checkbox" id="flexSwitchCheckCheckedDanger{{ $user->id }}"
                                wire:click="toggleStatus({{ $user->id }})" class="sr-only peer" {{ $user->status ? 'checked' : '' }}>
                            <div
                                class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600">
                            </div>
                            <label for="flexSwitchCheckCheckedDanger{{ $user->id }}"
                                class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                        </label>
                        <!-- without node.js  -->
                        <!-- <div class="form-check-success form-check form-switch">
                                                        <input class="form-check-input status-toggle large-checkbox" type="checkbox"
                                                            id="flexSwitchCheckCheckedDanger{{ $user->id }}" wire:click="toggleStatus({{ $user->id }})"
                                                            {{ $user->status ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="flexSwitchCheckCheckedDanger{{ $user->id }}"></label>

                                                    </div> -->


                    </td>
                    <td>

                        <a href="{{route('edit.admin.user', $user->id)}}"  class="btn btn-info"><i
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
                <th>role</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>

</div>