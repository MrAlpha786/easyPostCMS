<!-- resources/views/components/employee-menu.blade.php -->

@props(['label', 'href', 'menuItems' => [], 'id' => ''])

<div>
    <div class="p-1 flex items-center justify-between">
        <x-secondaryButton>
            <a href="{{ $href }}">
                {{ $label }}
            </a>
        </x-secondaryButton>

        @if (count($menuItems) > 0)
            <i class="fas fa-angle-right"
                onclick="getElementById('{{ $id }}').classList.toggle('hidden'); this.classList.toggle('fa-angle-right'); this.classList.toggle('fa-angle-down')"></i>
        @endif
    </div>

    <div id="{{ $id }}" class="hidden pl-4">
        @foreach ($menuItems as $menuItem)
            <x-secondaryButton class="block">
                <a href="{{ $menuItem['href'] }}">
                    {{ $menuItem['label'] }}
                </a>
            </x-secondaryButton>
        @endforeach
    </div>
</div>
