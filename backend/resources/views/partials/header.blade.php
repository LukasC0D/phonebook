<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ auth()->check() ? '/home' : '/login' }}">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            @auth
                <li class="nav-item">
                    <a class="nav-link text-light" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/phonebook">Phonebook</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/about">About</a>
                </li>
            @endauth
        </ul>
        <ul class="navbar-nav ml-auto">
            @guest
                <li class="nav-item">
                    <a class="nav-link text-light" href="/register">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/login">Log In</a>
                </li>
            @endguest
        </ul>
        @auth
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span class="navbar-text">
                        <strong class="bfr">{{ Auth::user()->name }}</strong>
                    </span>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link">
                            <strong>Log Out</strong>
                        </button>
                    </form>
                </li>
            </ul>
        @endauth
    </div>
</nav>
