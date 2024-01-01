<x-app-layout>
    <div style="display: flex; justify-content: center">
        <article class="grid" style="max-width: 50%">
            <div>
                <hgroup>
                    <h1>Register</h1>
                    <h2>Create a new account</h2>
                </hgroup>
                <form>
                    <input
                        type="text"
                        name="nickname"
                        placeholder="Nickname"
                        aria-label="Nickname"
                        autocomplete="username"
                        required
                    />

                    <input
                        type="email"
                        name="email"
                        placeholder="Email"
                        aria-label="Email"
                        autocomplete="email"
                        required
                    />
                    <button type="submit" onclick="event.preventDefault()">Create account</button>
                </form>
            </div>
        </article>
    </div>
</x-app-layout>
