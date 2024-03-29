@php($me = Auth::user())
<x-app-layout>
    <article>
        <header>
            <h1>{{ $ad->title }}</h1>
        </header>

        <p>
            {{ $ad->description }}
        </p>

        <div x-data="{lb: null}" x-init="lb = new FsLightbox(); lb.props.sources=['https://picsum.photos/800/600'];" style="max-width: 15em;" >
            <image @click="lb.open();" src="https://picsum.photos/800/600"></image>
        </div>

        <footer>
            <p>
                <b> {{ $ad->price }} MDL </b>
            </p>
            <p>
                @if ($ad->user == $me)
                    Published on {{ $ad->created_at }}
                @else
                    Published by <a href="{{ route('profile.get', ['nickname' => $ad->user->nickname]) }}"> {{ $ad->user->nickname }} </a> on {{ $ad->created_at }}
                @endif
            </p>
            <p>
                Viewed {{ $ad->views }} times
            </p>
        </footer>
    </article>
</x-app-layout>
