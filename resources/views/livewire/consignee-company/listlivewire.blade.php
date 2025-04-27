<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Transport Company Name</th>
                        <th>Transport Company TIN</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <div wire:transition>
                        @foreach ($consigneeCompanies as $key => $tc)
                            <tr wire:transition.scale.origin.top wire:key="{{ $tc->id }}">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $tc->consignee_company_name }}</td>
                                <td>{{ $tc->consignee_company_tin }}</td>
                                <td>
                                    @if (Auth::user()->can('consignee.company.delete'))
                                        <a href="javascript:void(0);" id="delete" class="btn btn-danger"
                                            wire:confirm="Are you sure you want to delete {{$tc->transport_company_name}}?"
                                            wire:click="deleteTransportCompany({{ $tc->id }})">
                                            <i class="bx bx-trash"></i>
                                        </a>
                                    @endif
                                    @if (Auth::user()->can('consignee.company.edit'))
                                        <a href="{{route('edit.consigneeCompany', $tc->id)}}" class="btn btn-info">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    </div>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Sl</th>
                        <th>Transport Company Name</th>
                        <th>Transport Company TIN</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>