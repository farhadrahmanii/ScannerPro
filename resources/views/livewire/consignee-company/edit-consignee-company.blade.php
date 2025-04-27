<div class="card">
    <div class="p-4 card-body">
        <h5 class="mb-4">Edit Consignee Company</h5>
        <form class="row g-3" wire:submit.prevent="update" method="POST" id="myForm" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-md-6">
                <label for="consignee_company_name" class="form-label">Company Name</label>
                <input type="text" id="consignee_company_name" wire:model="consignee_company_name"
                    class="form-control rounded-lg @error('consignee_company_name') is-invalid @enderror"
                    placeholder="Company Name">
                @error('consignee_company_name')
                    <span class="text-red-500 text-bold">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="consignee_company_tin" class="form-label">Consignee Company TIN</label>
                <input type="text" id="consignee_company_tin" wire:model="consignee_company_tin"
                    class="form-control rounded-lg @error('consignee_company_tin') is-invalid @enderror"
                    placeholder="Company TIN">
                @error('consignee_company_tin')
                    <span class="text-red-500 text-bold">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-12">
                <div class="gap-3 d-md-flex d-grid align-items-center">
                    <button type="submit" wire:loading.attr="disabled" class="px-4 btn btn-primary">
                        <span wire:loading.remove>Update</span>
                        <span wire:loading class="spinner-border spinner-border-sm" role="status"
                            aria-hidden="true"></span>
                    </button>
                    <a href="{{ route('all.consigneeCompany') }}" class="px-4 btn btn-light">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>