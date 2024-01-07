<x-app-layout>
    <form role="search" style="width: 90%; margin-bottom: 5em;">
	<input type="search" placeholder="Search for a product" />
	<input type="submit" value="Search" />
    </form>
    <div class="grid" style="display: grid; grid-template-columns: repeat(4, 1fr); grid-template-rows: 1fr;">
	@foreach ( $ads as $ad)
	    <article style="margin-top: 3em; padding-top: 0; padding-bottom: 1em;">
		<header style="padding-top: 0; padding-bottom: 1em;"><b><a href="{{ route('ads.get', ['id' => $ad->id]) }}"> {{ $ad->title }}</a> </b></header>
		{{ $ad->thumbnail }}
		<span style="color: #424751;"><i>{{ $ad->description }}</i></span> </br> {{ $ad->price }}$
	    </article>
	@endforeach
    </div>
</x-app-layout>
