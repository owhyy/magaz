<nav>
    <ul>
        <li><strong><a href="{{ route('main') }}">MAGAZ</a></strong></li>
    </ul>
    <ul>
        @if (request()->route()->getName() !== 'request-login')
            <li><a href="{{ route('request-login') }}">Log In</a></li>
        @endif
    </ul>
</nav>
