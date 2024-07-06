<nav class="navbar">
    <a href="/" class="navbar__title">THO24.com</a>
    <div class="navbar__menu">
        @auth
        <a class="nav-link" href="/account">Account</a>
        @else
        <a class="nav-link" href="/register">Sign in</a>
        @endauth
    </div>
</nav>