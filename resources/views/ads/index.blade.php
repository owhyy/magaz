<x-app-layout>
    @include('ads.partials.search')
    @if (session('success'))
        {{-- TODO: display the success message --}}
    @endif
    <div
        style="display: grid; grid-template-columns: repeat(4, 1fr); grid-template-rows: 1fr; grid-column-gap: 1em; grid-row-gap: 2em;">
        @foreach ($ads as $ad)
            @include('ads.partials.card', ['ad' => $ad])
        @endforeach
    </div>
</x-app-layout>
