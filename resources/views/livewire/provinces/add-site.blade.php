<div class="card">
    <div class="p-4 card-body">
        <h5 class="mb-4">Add Site</h5>
        <form class="row g-3" wire:submit.prevent="save" method="POST" id="myForm" enctype="multipart/form-data"
            action="#">
            @csrf
            <div class="form-group col-md-3">
                <label for="p_id" class="form-label">Province</label>
                <select class="form-control rounded-lg @error('p_id')
                    is-invalid
                @enderror" wire:model="p_id" name="p_id" id="p_id">
                    <option>Select Province</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->Province_name }}</option>
                    @endforeach

                    </option>
                </select>
                @error('p_id')
                    <span class="text-red-500 text-bold">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group col-md-6">
                <label for="site_name" class="form-label">Site Name</label>
                <input type="text" id="site_name" wire:model="site_name"
                    class="form-control rounded-lg @error('site_name') is-invalid @enderror" placeholder="Kabul">
                @error('site_name')
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
                    <a href="{{route('site')}}" class="px-4 btn btn-light" wire:navigate>Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>