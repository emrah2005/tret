{{-- resources/views/layouts/navigation.blade.php --}}
<nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <a href="/" class="text-xl font-bold text-purple-600">Influentia</a>

        <div class="flex items-center gap-4">
            @auth
                <span class="text-gray-600">Hello, {{ auth()->user()->name }}</span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-red-500 hover:underline">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-purple-600">
                    Login
                </a>
                <a href="{{ route('register') }}" class="text-purple-600 font-semibold">
                    Register
                </a>
            @endauth
        </div>

    </div>
</nav>
