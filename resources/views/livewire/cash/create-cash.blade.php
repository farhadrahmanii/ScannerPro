<div class="card">
    <div class="p-4 card-body">
        <h5 class="mb-4">Add Cash Transaction</h5>

        <form wire:submit.prevent="submit" class="row g-3">
            @csrf

            <div class="form-group col-md-3">
                <label for="transaction_id" class="form-label">Transaction</label>
                <select id="transaction_id" wire:model="transaction_id" class="form-control rounded-lg @error('transaction_id') is-invalid @enderror">
                    <option value="" disabled selected>Select Transaction</option>
                    @foreach($transactions as $transaction)
                        <option value="{{ $transaction->id }}">{{ $transaction->transaction_id }}</option>
                    @endforeach
                </select>
                @error('transaction_id') <span class="text-red-500 text-bold">{{ $message }}</span> @enderror
            </div>

            <div class="form-group col-md-3">
                <label for="driver_id" class="form-label">Driver</label>
                <select id="driver_id" wire:model="driver_id" class="form-control rounded-lg @error('driver_id') is-invalid @enderror">
                    <option value="" disabled selected>Select Driver</option>
                    @foreach($drivers as $driver)
                        <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                    @endforeach
                </select>
                @error('driver_id') <span class="text-red-500 text-bold">{{ $message }}</span> @enderror
            </div>

            <div class="form-group col-md-3">
                <label for="amount" class="form-label">Amount</label>
                <input type="number" id="amount" wire:model="amount" class="form-control rounded-lg @error('amount') is-invalid @enderror" placeholder="1000.00">
                @error('amount') <span class="text-red-500 text-bold">{{ $message }}</span> @enderror
            </div>

            <div class="form-group col-md-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" id="date" wire:model="date" class="form-control rounded-lg @error('date') is-invalid @enderror">
                @error('date') <span class="text-red-500 text-bold">{{ $message }}</span> @enderror
            </div>

            <div class="form-group col-md-12">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" wire:model="description" class="form-control rounded-lg @error('description') is-invalid @enderror" placeholder="Description"></textarea>
                @error('description') <span class="text-red-500 text-bold">{{ $message }}</span> @enderror
            </div>

            <div class="form-group col-md-3">
                <label for="casher_id" class="form-label">Casher</label>
                <select id="casher_id" wire:model="casher_id" class="form-control rounded-lg @error('casher_id') is-invalid @enderror">
                    <option value="" disabled selected>Select Casher</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('casher_id') <span class="text-red-500 text-bold">{{ $message }}</span> @enderror
            </div>

            <div class="form-group col-md-3">
                <label for="receiver_id" class="form-label">Receiver</label>
                <select id="receiver_id" wire:model="receiver_id" class="form-control rounded-lg @error('receiver_id') is-invalid @enderror">
                    <option value="" disabled selected>Select Receiver</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('receiver_id') <span class="text-red-500 text-bold">{{ $message }}</span> @enderror
            </div>

            <div class="form-group col-md-3">
                <label for="approved_by" class="form-label">Approved By</label>
                <select id="approved_by" wire:model="approved_by" class="form-control rounded-lg @error('approved_by') is-invalid @enderror">
                    <option value="" disabled selected>Select Approver</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('approved_by') <span class="text-red-500 text-bold">{{ $message }}</span> @enderror
            </div>

            <div class="col-md-12">
                <div class="gap-3 d-md-flex d-grid align-items-center">
                    <button type="submit" class="px-4 btn btn-primary">
                        <span wire:loading.remove>Save</span>
                        <span wire:loading>
                            <div class="spinner-border spinner-border-sm"></div>
                            Loading...
                        </span>
                    </button>
                    <a href="{{ route('all.cash') }}" class="px-4 btn btn-light" wire:navigate>Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>
