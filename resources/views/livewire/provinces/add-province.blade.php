<div class="card">
    <div class="p-4 card-body">
        <h5 class="mb-4">Add Driver</h5>
        <form class="row g-3" wire:submit.prevent="save" method="POST" id="myForm" enctype="multipart/form-data"
            action="#">
            @csrf
            <div class="form-group col-md-6">
                <label for="Province_name" class="form-label">Province Name</label>
                <input type="text" id="Province_name" wire:model="Province_name"
                    class="form-control rounded-lg @error('Province_name') is-invalid @enderror" placeholder="Kabul">
                @error('Province_name')
                    <span class="text-red-500 text-bold">{{$message}}</span>
                @enderror
            </div>


            <div class="col-md-12">
                <div class="gap-3 d-md-flex d-grid align-items-center">
                    <button type="submit" wire:click.prevent="save" wire:loading.attr="disabled"
                        class="px-4 btn btn-primary">
                        <span wire:loading.remove>Save</span>
                        <span wire:loading class="spinner-border spinner-border-sm" role="status"
                            aria-hidden="true"></span>

                    </button>
                    <a href="{{route('province.site')}}" class="px-4 btn btn-light">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>