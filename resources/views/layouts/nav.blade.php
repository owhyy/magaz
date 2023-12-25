<nav>
    <ul>
        <li><strong><a href="/">MAGAZ</a></strong></li>
    </ul>
    <ul>
        @if (request()->route()->getName() !== 'login')
            <li><a href="/login">Log In</a></li>
        @endif
    </ul>
</nav>
