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
                    @include('layouts.ad-card', ['ad' => $ad])
                @endforeach
            </div>
        </article>

    </div>
</x-app-layout>
