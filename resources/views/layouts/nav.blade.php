<nav>
    <ul>
        <li><strong><a href="{{ route('ads.index') }}">MAGAZ</a></strong></li>
    </ul>
    <ul>

        @if (auth()->check())
            <li>
                <details class="dropdown">
                    <summary>
                        {{ auth()->user()->nickname }}
                    </summary>
                    <ul dir="rtl">
                        <li><a href="{{ route('ads.create') }}">Submit an ad</a></li>
                        <li><a href="{{ route('profile.edit') }}">Manage profile</a></li>
                        <li><a href="{{ route('logout') }}">Log out</a></li>
                    </ul>
                </details>
            </li>
        @else
            @if (request()->route()->getName() !== 'login')
                <li><a href="{{ route('login') }}">Log In</a></li>
            @endif
            @if (request()->route()->getName() !== 'register')
                <li><a href="{{ route('register') }}">Register</a></li>
            @endif
        @endif
    </ul>
</nav>
