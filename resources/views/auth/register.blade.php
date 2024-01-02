<x-app-layout>
    <div style="display: flex; justify-content: center">
        <article class="grid" style="max-width: 50%; min-width: 50%;">
            <div>
                <hgroup>
                    <h1>Register</h1>
                    <h2>Create a new account</h2>
                </hgroup>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <input
                        type="text"
                        name="nickname"
                        placeholder="Nickname"
                        aria-label="Nickname"
                        aria-invalid="{{ $errors->any() ? ($errors->has('nickname') ? 'true' : 'false') : 'none' }}"
                        autocomplete="username"
                        required
                        value="{{ old('nickname') }}"
                    />
                    @if ($errors->has('nickname'))
                        <small id="valid-helper">{{ $errors->get('nickname')[0] }}</small>
                    @endif

                    <input
                        type="email"
                        name="email"
                        placeholder="Email"
                        aria-label="Email"
                        aria-invalid="{{ $errors->any() ? ($errors->has('email') ? 'true' : 'false') : 'none' }}"
                        autocomplete="email"
                        required
                        value="{{ old('email') }}"
                        aria-describedby="valid-helper"
                    />
                    @if ($errors->has('email'))
                        <small id="valid-helper">{{ $errors->get('email')[0] }}</small>
                    @endif

                    <button type="submit">Create account</button>

                </form>
            </div>
        </article>
    </div>
</x-app-layout>
