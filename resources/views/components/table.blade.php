@props(['headers'])

<div class=" bg-white rounded-2xl shadow-sm" x-data="{ selectAll: false }">
    <div class="border-b-2 p-5 w-full flex justify-between gap-2">
        <select class="select select-bordered w-full max-w-xs rounded-xl">
            <option disabled selected>Who shot first?</option>
            <option>Han Solo</option>
            <option>Greedo</option>
        </select>

        <label class="input input-bordered flex items-center gap-2 rounded-xl">
            <input
                type="text"
                class="grow"
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
                                x-on:click=" selectAll = selectAll ? false : true; console.log(selectAll);"
                                wire:click="changeProductSelected(null, true)" />
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



