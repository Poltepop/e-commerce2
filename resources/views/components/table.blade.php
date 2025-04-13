@props(['headers'])

<div class=" bg-white rounded-2xl shadow-sm"
        x-data="{
                    selectAll: false,
                    productIds: [],
                    selectedItems: [],
                    selectedMethod: '',

                    deleteMany() {
                        $wire.deleteMany(this.selectedItems);
                        console.log('helloDeleteMany');
                    },

                    updateMany() {
                        $wire.updateMany(this.selectedItems);
                        console.log('helloUpdateMany');
                    },

                    run() {
                        if (typeof this[this.selectedMethod] === 'function') {
                            this[this.selectedMethod]();
                        }
                    },
                }">
    <div class="border-b-2 p-5 w-full flex justify-between gap-2">
        <x-input-select class="max-w-xs" x-model="selectedMethod" x-on:change="run()">
            <x-slot:disabled>Filltering</x-slot:disabled>
            <option value="updateMany" class="cursor-pointer">Update</option>
            <option value="deleteMany" class="cursor-pointer">Delete</option>
        </x-input-select>

        <label class="input input-bordered flex items-center gap-2 rounded-xl">
            <input
                type="text"
                class="grow border-none focus:ring-0"
                placeholder="Search"
                wire:model.live.debounce.1000ms='searchUser' />
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 16 16"
              fill="currentColor"
              class="h-4 w-4 opacity-70">
              <path
                fill-rule="evenodd"
                d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                clip-rule="evenodd" />
            </svg>
        </label>
    </div>

    <div class="overflow-x-auto w-ful">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>
                        <label>
                            <input
                                type="checkbox"
                                class="checkbox"
                                :checked="selectAll"
                                x-on:change="selectedItems = productIds;"
                                x-model="selectAll"/>
                        </label>
                    </th>
                    @foreach ($headers as $header)
                    <th>{{ $header }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                {{ $slot }}
            </tbody>
        </table>
    </div>
</div>



