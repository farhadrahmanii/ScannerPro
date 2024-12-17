<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Driver ID</th>
                        <th>Name</th>
                        <th>Contact Info</th>
                        <th>Transport Company</th>
                        <th>Tranport Company TIN</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($drivers as $key => $drive)
                        <tr>
                            <td>
                                {{ $key + 1}}
                            </td>
                            <td>
                                {{ $drive->id}}
                            </td>
                            <td>
                                {{ $drive->name}}
                            </td>
                            <td>
                                {{ $drive->contact_information}}
                            </td>
                            <td>
                                {{ $drive->transport_company}}
                            </td>
                            <td>
                                {{ $drive->transport_company_tin}}
                            </td>
                            <td>

                                <div class="col">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info">Actions</button>
                                        <button type="button"
                                            class="btn btn-info split-bg-info dropdown-toggle dropdown-toggle-split"
                                            data-bs-toggle="dropdown" aria-expanded="false"> <span
                                                class="visually-hidden">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" style="">
                                            <li><a class="dropdown-item"
                                                    href="{{route('edit.driver', $drive->id)}}">Edit</a>
                                            </li>
                                            <li><a class="dropdown-item"
                                                    href="{{route('driver.details', $drive->id)}}">View</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="{{route('add.vehicle', $drive->id)}}">Add
                                                    Vehicle</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Sl</th>
                        <th>Driver ID</th>
                        <th>Name</th>
                        <th>Contact Info</th>
                        <th>Transport Company</th>
                        <th>Tranport Company TIN</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>