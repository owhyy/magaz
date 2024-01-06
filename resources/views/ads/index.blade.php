<x-app-layout>
    <form role="search" style="width: 90%; margin-bottom: 5em;">
	<input type="search" placeholder="Search for a product" />
	<input type="submit" value="Search" />
    </form>
    <div style="display: grid; grid-template-columns: 3fr 1fr; grid-template-rows: repeat(1, 1fr);">
	    <div>
		<ul>
		    @foreach ( $ads as $ad)
			<li>{{ $ad['title'] }}</li>
		    @endforeach
		</ul>
	    </div>
	    <!-- TODO: this will be the category table someday -->
	    <div>
		<ul>
		    @foreach ( $ads as $ad)
			<li>{{ $ad['title'] }}</li>
		    @endforeach
		</ul>
	    </div>
	</div>
</x-app-layout>
