<x-app-layout>
    <div class="container" style="max-width: 60%">

        <article>
            <header>
                <span>
                    <h3> {{ $user->nickname }}</h3> <i> on site since {{ $user->created_at->year }}</i>
                </span>
            </header>

            <h4>User's ads</h4>
            </br>
            <div
                style="display: grid; grid-template-columns: repeat(4, 1fr); grid-template-rows: 1fr; grid-column-gap: 1em; grid-row-gap: 2em;">
                @foreach ($user->ads as $ad)
                    <a href="{{ route('ads.get', ['id' => $ad->id]) }}" style="text-decoration: none; color: inherit;">
                        <article style="padding-left: 1em; padding-right: 1em; margin-bottom: 0; padding-top: 1em; height: 15em; width: 12em;">
                            <p><b><span style="color: #424751;"> {{ Str::of($ad->title)->limit(15) }}</span> </b></p>
                            <p >
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
                        </article>
                    </a>
                @endforeach
            </div>
        </article>

    </div>
</x-app-layout>
