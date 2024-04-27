<x-app-layout>
    <div class="container" style="width: 62%">
        <article>
            <h3>Edit profile</h3>
            <form action="{{ route('profile.edit') }}" method="post">
                @csrf
                <fieldset>
                    <label>
                        Phone number
                        <input type="text" name="phone_number" value="{{ $user->phone_number }}"/>
                    </label>
                </fieldset>
            </form>
            <hr/>
            <h3>My posts</h3>
            <div
                style="display: grid; grid-template-columns: repeat(4, 1fr); grid-template-rows: 1fr; grid-column-gap: 1em; grid-row-gap: 2em;">
                @foreach ($user->ads as $ad)
                    @include('ads.partials.card', ['ad' => $ad])
                @endforeach
            </div>

        </article>
    </div>
</x-app-layout>
