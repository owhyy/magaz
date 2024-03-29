<x-app-layout>
    <div style="display: grid; grid-template-columns: .5fr 1fr; grid-template-rows: 1fr; margin-bottom: 4em;">
        <details class="dropdown" style="margin-right: 5em;">
            <summary>Categories</summary>
            <ul>
                {{-- TODO: add categories --}}
            </ul>
        </details>
        <form role="search">
            <input type="search" placeholder="Search for a product"/>
            <input type="submit" value="Search"/>
        </form>
    </div>
    @if(session('success'))
        {{-- TODO: display the success message --}}
    @endif
    <div
        style="display: grid; grid-template-columns: repeat(4, 1fr); grid-template-rows: 1fr; grid-column-gap: 1em; grid-row-gap: 2em;">
        @foreach ( $ads as $ad)
            <a href="{{ route('ads.get', ['id' => $ad->id]) }}" style="text-decoration: none; color: inherit;">
                <article style="margin-bottom: 0; padding-top: 1em; padding-bottom: 1em; height: 18.5em;">
                    <p><b><span style="color: #424751;"> {{ Str::of($ad->title)->limit(20) }}</span> </b></p>
                    <p>
                        {{-- TODO: this is what it should be set to --}}
                        {{-- {{ $ad->thumbnail }} --}}
                        {{-- TODO: also set fallback image --}}
                        <image src="https://picsum.photos/800/600"></image>
                    </p>
                    <p>
                        <span
                            style="color: #424751;"><i>posted on {{ $ad->created_at->isSameDay(now()) ? $ad->created_at->format('H:i') : $ad->created_at->format('M d') }}</i></span>
                        </i></span>
                    </p>
                    <p>
			<span>
			    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye"
                     viewBox="0 0 16 16">
				<path
                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
				<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
			    </svg>
			    {{ $ad->views }}
			</span>
                        <span style="float: right;">{{ $ad->price }}$ </span>
                    </p>
                    </p>
                </article>
            </a>
        @endforeach
    </div>
</x-app-layout>
