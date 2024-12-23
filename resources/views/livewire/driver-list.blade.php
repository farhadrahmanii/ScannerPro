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
                                    <div class="flex justify-center">
                                        <div x-data="{open: false, toggle() { if (this.open) {
                                                                                                                                                            return this.close()
                                                                                                                                                        }

                                                                                                                                                        this.$refs.button.focus()

                                                                                                                                                        this.open = true
                                                                                                                                                    },
                                                                                                                                                    close(focusAfter) {
                                                                                                                                                        if (! this.open) return
                                                                                                                                                        this.open = false
                                                   focusAfter && focusAfter.focus()
                                                                                                                                                    }
                                                                                                                                                }"
                                            x-on:keydown.escape.prevent.stop="close($refs.button)"
                                            x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                                            x-id="['dropdown-button']" class="relative">
                                            <!-- Button -->
                                            <button x-ref="button" x-on:click="toggle()" :aria-expanded="open"
                                                :aria-controls="$id('dropdown-button')" type="button"
                                                class="relative flex items-center whitespace-nowrap justify-center gap-2 py-2 rounded-lg shadow-sm bg-green bg-green-50 hover:bg-green-100 text-green-800 border border-green-200 hover:border-gray-200 px-4">
                                                <span>Actions</span>

                                                <!-- Heroicon: micro chevron-down -->
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                                                    fill="currentColor" class="size-4">
                                                    <path fill-rule="evenodd"
                                                        d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>

                                            <!-- Panel -->
                                            <div x-ref="panel" x-show="open" x-transition.origin.top.left
                                                x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')"
                                                x-cloak
                                                class="absolute left-0 min-w-48 rounded-lg  shadow-sm mt-2 z-10 origin-top-left bg-white p-1.5 outline-none border border-gray-200">
                                                @if (Auth::user()->can('driver.edit'))
                                                    <a href="{{route('edit.driver', $drive->id)}}" wire:navigate
                                                        class="px-2 lg:py-1.5 py-2 w-full flex items-center rounded-md transition-colors text-left text-gray-800 hover:bg-yellow-50 focus-visible:bg-yellow-50 hover:text-yellow-600 disabled:opacity-50 disabled:cursor-not-allowed">
                                                        Edit
                                                    </a>
                                                @endif
                                                @if (Auth::user()->can('view.driver'))
                                                    <a href="{{route('driver.details', $drive->id)}}" wire:navigate
                                                        onclick="closeModalAndReset()"
                                                        class="px-2 lg:py-1.5 py-2 w-full flex items-center rounded-md transition-colors text-left text-gray-800 hover:bg-blue-50 focus-visible:bg-blue-50 hover:text-blue-600 disabled:opacity-50 disabled:cursor-not-allowed">
                                                        Driver Details
                                                    </a>
                                                @endif

                                                @if (Auth::user()->can('add.vehicle.to.driver'))
                                                    <a href="{{route('add.vehicle', $drive->id)}}" wire:navigate
                                                        class="px-2 lg:py-1.5 py-2 w-full flex items-center rounded-md transition-colors text-left text-gray-800 hover:bg-green-50 hover:text-green-600 focus-visible:bg-red-50 focus-visible:text-red-600 disabled:opacity-50 disabled:cursor-not-allowed">
                                                        Add Vehicle
                                                    </a>
                                                @endif

                                            </div>
                                        </div>
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
    </div>.
    <!-- <script>
        function closeModalAndReset() {
            // Close any open modal
            const modals = document.querySelectorAll('.modal.show');
            modals.forEach(modal => {
                const instance = bootstrap.Modal.getInstance(modal);
                if (instance) {
                    instance.hide();
                }
            });

            // Reset buttons or any other interactive states
            // Add your custom reset logic here, if necessary
        }

        // Automatically handle navigation lifecycle events from Livewire
        document.addEventListener('livewire:navigate', () => {
            closeModalAndReset();
        });
    </script> -->




    <!-- /////////////////////////////////////////////////////////////////////// -->


    <div x-data="notifications"
        class="fixed inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-6 sm:items-start">
        <div class="flex flex-col w-full space-y-4 sm:items-end">
            <template x-for="notification in notifications" :key="notification . id">
                <div x-show="visible.includes(notification)"
                    x-transition:enter="transform ease-out duration-300 transition"
                    x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                    x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
                    x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                    <div class="p-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2l4-4m0 0a9 9 0 11-4 4.17"></path>
                                </svg>
                            </div>
                            <div class="ml-3 w-0 flex-1 pt-0.5">
                                <p class="text-sm font-medium text-gray-900" x-text="notification.title"></p>
                                <p class="mt-1 text-sm text-gray-500" x-text="notification.message"></p>
                            </div>
                            <div class="ml-4 flex-shrink-0 flex">
                                <button @click="close(notification)"
                                    class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <span class="sr-only">Close</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('notifications', () => ({
                notifications: [],
                visible: [],
                add(notification) {
                    notification.id = Date.now()
                    this.notifications.push(notification)
                    this.fire(notification.id)
                },
                fire(id) {
                    this.visible.push(this.notifications.find(notification => notification.id === id))
                    const timeShown = 3000
                    setTimeout(() => {
                        this.remove(id)
                    }, timeShown)
                },
                remove(id) {
                    const notification = this.visible.find(notification => notification.id === id)
                    const index = this.visible.indexOf(notification)
                    this.visible.splice(index, 1)
                },
                close(notification) {
                    this.remove(notification.id)
                }
            }))
        })
    </script>











    <!-- /////////////////////////////////////////////////////////////////////// -->

</div>