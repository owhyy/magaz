<x-app-layout>
    <div style="display: flex; justify-content: center">
        <article class="grid" style="max-width: 50%">
            <div>
                <hgroup>
                    <h1>Log in</h1>
                    <h2>Enter your email below, and, if an account associated with it exists, you will receive your
                        access link</h2>
                </hgroup>
                <form>
                    <input
                        type="email"
                        name="email"
                        placeholder="Email"
                        aria-label="Email"
                        autocomplete="email"
                        required
                    />
                    <button type="submit" onclick="event.preventDefault()">Get my access link</button>
                    <a href="{{ route('register') }}">Create an account</a>
                </form>
            </div>
        </article>
    </div>
</x-app-layout>
