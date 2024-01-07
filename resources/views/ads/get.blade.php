<x-app-layout>
    <article>
	<header>
	    <h1>{{ $ad->title }}</h1>
	</header>
	
	{{ $ad->thumbnail }}
	
	<p>
	    {{ $ad->description }}
	</p>
	
	<footer>
	    <p>
		Price: {{ $ad->price }}
	    </p>
	    <p>
		Published by <a href="{{ route('profile.get', ['nickname' => $ad->user->nickname]) }}"> {{ $ad->user->nickname }} </a> on {{ $ad->created_at }}
	    </p>
	    <p>
		Viewed by {{ $ad->views }} {{ $ad->views == 1 ? 'person' : 'people' }}
	    </p>
	</footer>
    </article>
</x-app-layout>
