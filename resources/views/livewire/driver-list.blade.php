<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Driver ID</th>
                        <th>Name</th>
                        <th>Father Name</th>
                        <th>National ID</th>
                        <th>Passport No</th>
                        <th>Contact Information</th>
                        <th>Nationality</th>
                        <th>Transport Company</th>
                        <th>Tranport Company TIN</th>
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
                                {{ $drive->father_name}}
                            </td>
                            <td>
                                {{ $drive->national_id}}
                            </td>
                            <td>
                                {{ $drive->passport_no}}
                            </td>
                            <td>
                                {{ $drive->contact_information}}
                            </td>
                            <td>
                                {{ $drive->nationality}}
                            </td>
                            <td>
                                {{ $drive->transport_company}}
                            </td>
                            <td>
                                {{ $drive->transport_company_tin}}
                            </td>
                            <td>
                                <a href="" class="btn btn-danger"><i class="bx bx-trash"></i></a>
                                <a href="" class="btn btn-info"><i class="bx bx-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Sl</th>
                        <th>Driver ID</th>
                        <th>Name</th>
                        <th>Father Name</th>
                        <th>National ID</th>
                        <th>Passport No</th>
                        <th>Contact Information</th>
                        <th>Nationality</th>
                        <th>Transport Company</th>
                        <th>Tranport Company TIN</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>