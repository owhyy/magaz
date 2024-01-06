<x-app-layout>
    <div style="display: flex; justify-content: center">
        <article class="grid">
            <div>
                <hgroup>
                    <h1>Error</h1>
		    <p>The link is invalid or expired. Try logging in again</p>
		    </br>
		    <p><a href="{{ route('main') }}">Go back</a></p>
                </hgroup>
            </div>
        </article>
    </div>
</x-app-layout>
