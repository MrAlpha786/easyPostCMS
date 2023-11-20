<div {{ $attributes->merge(['class' => 'ml-auto pr-4']) }}>
    <!-- User is logged in, display Logout link -->
    @auth
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
    @else
        <!-- Login button -->
        <x-secondaryButton>
            <a href="{{ route('login') }}">Log In</a>
        </x-secondaryButton>
    @endauth
</div>
