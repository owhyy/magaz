<nav>
    <ul>
        <li><strong><a href="{{ route('main') }}">MAGAZ</a></strong></li>
    </ul>
    <ul>
        @if (request()->route()->getName() !== 'login')
            <li><a href="{{ route('login') }}">Log In</a></li>
        @endif
    </ul>
</nav>
