<nav>
    <ul>
        <li><strong><a href="{{ route('main') }}">MAGAZ</a></strong></li>
    </ul>
    <ul>

	@if (Auth::check())
	    <li><a href="{{ route('profile.edit') }}">My profile</a></li>
	@else
	    @if (request()->route()->getName() !== 'login')
		<li><a href="{{ route('login') }}">Log In</a></li>
	    @endif
	@endif
    </ul>
</nav>
