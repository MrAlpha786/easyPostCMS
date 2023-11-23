{{-- Header button for login and logout --}}
<div {{ $attributes->merge(['class' => 'ml-auto pr-4']) }}>
    <!-- User is logged in, display Logout link -->
    @auth

        <div class="flex items-center">
            <x-secondaryButton>
                <a href="{{ route('dashboard') }}">
                    {{ auth()->user()->firstname }}
                </a>
            </x-secondaryButton>
            <!-- Logout button -->
            <x-secondaryButton>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </x-secondaryButton>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    @else
        <!-- Login button -->
        <x-secondaryButton>
            <a href="{{ route('login') }}">Log In</a>
        </x-secondaryButton>
    @endauth
</div>
