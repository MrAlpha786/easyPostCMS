{{-- Custom pagination buttons and details --}}
<div class="flex items-center justify-between m-2">

    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <x-secondaryButton class="flex items-center text-gray-400" disabled>
            <i class="fas fa-long-arrow-left px-2"></i>
            Prev
        </x-secondaryButton>
    @else
        <x-secondaryButton class="flex items-center">
            <a href="{{ $paginator->previousPageUrl() }}">
                <i class="fas fa-long-arrow-left px-2"></i>
                Prev
            </a>
        </x-secondaryButton>
    @endif

    <div>
        <p class="text-sm text-gray-700 leading-5">
            {!! __('Showing') !!}
            @if ($paginator->firstItem())
                <span class="font-medium">{{ $paginator->firstItem() }}</span>
                {!! __('to') !!}
                <span class="font-medium">{{ $paginator->lastItem() }}</span>
            @else
                {{ $paginator->count() }}
            @endif
            {!! __('of') !!}
            <span class="font-medium">{{ $paginator->total() }}</span>
            {!! __('results') !!}
        </p>
    </div>

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <x-secondaryButton class="flex items-center">
            <a href="{{ $paginator->nextPageUrl() }}" rel="next">
                Next
                <i class="fas fa-long-arrow-right px-2"></i>
            </a>
        </x-secondaryButton>
    @else
        <x-secondaryButton class="flex items-center text-gray-400" disabled>
            Next
            <i class="fas fa-long-arrow-right px-2"></i>
        </x-secondaryButton>
    @endif
</div>
