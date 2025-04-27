<div class="card">
    <div class="p-4 card-body">
        <h5 class="mb-4">Example Form</h5>
        <form class="row g-3" method="POST" id="exampleForm" wire:submit.prevent="save" enctype="multipart/form-data">
            @csrf

            <div class="form-group col-md-3" wire:ignore>
                <label for="example_select" class="form-label">Example Select</label>
                <select id="example_select" wire:model="example_select" data-pharaonic="select2"
                    data-component-id="{{ $this->getId() }}" class="form-control rounded-lg">
                    <option value="Option1">Option 1</option>
                    <option value="Option2">Option 2</option>
                    <option value="Option3">Option 3</option>
                    <option value="Option4">Option 4</option>
                </select>
                @error('example_select')
                    <span class="text-red-500 text-bold">{{ $message }}</span>
                @enderror
            </div>

            // ...existing code...

            <div class="col-md-12">
                <div class="gap-3 d-md-flex d-grid align-items-center">
                    <button type="submit" wire:loading.attr="disabled" class="px-4 btn btn-primary">
                        <span wire:loading.remove>Save</span>
                        <span wire:loading class="spinner-border spinner-border-sm" role="status"
                            aria-hidden="true"></span>
                    </button>
                    <a href="{{ route('all.examples') }}" class="px-4 btn btn-light">Cancel</a>
                </div>
            </div>
        </form>
    </div>
    <script>
        document.addEventListener('livewire:load', () => {
            $('#example_select').select2({
                placeholder: "Select an Option",
                allowClear: true
            });
            $('#example_select').on('change', function () {
                @this.set('example_select', $(this).val());
            });

            // ...existing code...
        });

        Livewire.hook('message.processed', (message, component) => {
            $('#example_select').select2({
                placeholder: "Select an Option",
                allowClear: true
            });
        });
    </script>
</div>
