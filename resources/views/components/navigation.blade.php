<nav class="navbar">
    <x-navlink link="movies.index">Movies</x-navlink>
    <x-navlink link="about">About</x-navlink>
    <x-navlink link="contact">Contact</x-navlink>

    @auth
        <x-navlink link="movies.create">Create Movie</x-navlink>
        @if(auth()->user()->role === 'admin')
            <x-navlink link="admin.index">Admin Panel</x-navlink>
        @endif
    @endauth

    <div class="nav-auth">
        @guest
            <a href="{{ route('login') }}" class="nav-button">
                Login
            </a>

            <a href="{{ route('register') }}" class="nav-button">
                Register
            </a>
        @endguest

        @auth
            <x-navlink link="profile.edit">Profile</x-navlink>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-button">
                    Logout
                </button>
            </form>
        @endauth
    </div>
</nav>
