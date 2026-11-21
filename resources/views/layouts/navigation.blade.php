<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex space-x-4">
                <a href="{{ route('welcome') }}">Welcome</a>
                <a href="{{ route('tasks.index') }}">Tasks</a>
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('profile.public') }}">Profile</a>
            </div>

            <div>
                @auth
                    <span>{{ Auth::user()->name }}</span>
                    <a href="{{ route('dashboard') }}" class="ml-4">Dashboard</a>

                    <form method="POST" action="{{ route('logout') }}" class="inline ml-4">
                        @csrf
                        <button type="submit">Log Out</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Log In</a>
                    <a href="{{ route('register') }}" class="ml-4">Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>