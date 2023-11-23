{{-- Custom searchbar component --}}
@props(['route' => '#'])

<div>
    <form accept="{{ $route }}" method="GET" class="flex items-center pb-4" onsubmit="return validateSearch()">
        @csrf
        <input name="q" id="searchInput" type="text" value="{{ old('q') }}"
            class="w-full px-3 py-2 rounded-md rounded-r-none appearance-none text-gray-700 focus:outline-none"
            placeholder="Search..." />

        @if (request()->has('q'))
            <button type="button" class="px-4 py-2 text-red-500 bg-white" onclick="clearSearch()">
                <i class="fas fa-close"></i>
            </button>
        @endif

        <x-primaryButton class="px-8 py-2 rounded-l-none" onclick="submitSearch()">
            Search
        </x-primaryButton>

    </form>

    <script>
        function validateSearch() {
            const searchInput = document.querySelector('input[name="q"]');
            return searchInput.value.trim() !== ''; // Only submit the form if there is a value in the search input
        }

        function clearSearch() {
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.delete('q');
            window.location.search = urlParams.toString();
        }
    </script>
</div>
