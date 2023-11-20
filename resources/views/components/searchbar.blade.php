@props(['route' => '#'])

<div>
    <form accept="{{ $route }}" method="GET" class="flex items-center pb-4">
        <input type="text"
            class="w-full px-3 py-2 rounded-md rounded-r-none appearance-none shadow-md text-gray-700 focus:outline-none"
            placeholder="Search..." />
        <x-primaryButton class="px-8 py-2 border rounded-l-none">
            <input type="submit" value="Search">
        </x-primaryButton>
    </form>
</div>
