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
    @if (session('success'))
        {{-- TODO: display the success message --}}
    @endif
    <div
        style="display: grid; grid-template-columns: repeat(4, 1fr); grid-template-rows: 1fr; grid-column-gap: 1em; grid-row-gap: 2em;">
        @foreach ($ads as $ad)
            @include('layouts.ad-card', ['ad' => $ad])
        @endforeach
    </div>
</x-app-layout>
