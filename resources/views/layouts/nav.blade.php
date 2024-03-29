<nav class="flex justify-between items-center mb-4">
    <a href="{{ route('home') }}"><img class="w-24" src="{{ asset('images/logo.png') }}" alt=""
            class="logo" /></a>
    <ul class="flex space-x-6 mr-6 text-lg">
        @auth
            <li>
                <span class="font-bold uppercase">
                    Welcome {{ auth()->user()->name }}
                </span>
            </li>
            <li>
                <a href="{{ route('manage-listings') }}" class="hover:text-laravel"><i class="fa-solid fa-gear"></i>
                    Manage Listings</a>
            </li>
            <li>
                <form class="inline" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="hover:text-laravel"><i class="fa-solid  fa-door-closed"></i>
                        Logout</button>
                </form>
            </li>
        @else
            <li>
                <a href="{{ route('register') }}" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i>
                    Register</a>
            </li>
            <li>
                <a href="{{ route('login') }}" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Login</a>
            </li>
        @endauth
    </ul>
</nav>
