@extends('admin.adminDashboard')
@section('admin')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<style>
    .large-checkbox {
        transform: scale(1.5);
    }
</style>

<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        <div class="breadcrumb-title pe-3">All Drivers</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Driver</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{route('add.driver')}}" class="px-5 btn btn-primary">Add Driver</a>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
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

</div>

<script>

</script>



@endsection