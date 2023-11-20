<!-- resources/views/components/employee-menu.blade.php -->

@props(['label', 'href', 'menuItems' => [], 'id' => ''])

<div>
    <x-secondaryButton class="flex items-center justify-between">
        <a href="{{ $href }}">
            {{ $label }}
        </a>

        @if (count($menuItems) > 0)
            <i class="fas fa-angle-right"
                onclick="getElementById('{{ $id }}').classList.toggle('hidden'); this.classList.toggle('fa-angle-right'); this.classList.toggle('fa-angle-down')"></i>
        @endif
    </x-secondaryButton>

    <div id="{{ $id }}" class="hidder ml-2 pl-2">
        @foreach ($menuItems as $menuItem)
            <x-secondaryButton>
                <a href="{{ $menuItem['href'] }}">
                    {{ $menuItem['label'] }}
                </a>
            </x-secondaryButton>
        @endforeach
    </div>
</div>
