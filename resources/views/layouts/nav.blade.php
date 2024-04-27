<nav>
    <ul>
        <li><strong><a href="{{ route('main') }}">MAGAZ</a></strong></li>
    </ul>
    <ul>

	@if (Auth::check())
	    <li><a href="{{ route('profile.edit') }}"></a></li>
	    <li>
		<details class="dropdown">
		    <summary>
			{{ Auth::user()->nickname }}
		    </summary>
		    <ul dir="rtl">
			<li><a href="{{ route('ads.create') }}">Add a product</a></li>
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
