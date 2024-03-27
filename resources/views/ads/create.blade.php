<x-app-layout>
    <div class="container" style="width: 50%">
        <article>
            <h1>Post a new ad</h1>
            <form action="{{ route('ads.create') }}" method="post">
                @csrf
                <fieldset>
                    <label>
                        Title
                        <input
                            type="text"
                            name="title"
                            placeholder="Title"
                            autocomplete="title"
                            required
                        />
                    </label>
                    <label>
                        Description
                        <textarea
                            name="description"
                            rows="3"
                            placeholder="The charateristics of the thing you're selling, its quality etc."
                            autocomplete="description"
                            required></textarea>
                    </label>
                    <label>
                        Category
                        <select
                            name="category"
                            autocomplete="category"
                            required>
                            <option value="general">General</option>

                            {{--                            TODO: add category model and make this owrk--}}
                            {{--                            @foreach(Category::all() as $category)--}}
                            {{--                                <option value="{{ $category->title }}">{{ ucfirst($category->title) }}</option>--}}
                            {{--                            @endforeach--}}

                        </select>
                    </label>
{{-- TODO --}}
{{--                    <label x-data="{ files: null }">--}}
{{--                        Images--}}
{{--                        <input type="file" style="display: none" id="files" multiple="true"--}}
{{--                               x-on:change="files = Object.values($event.target.files)">--}}
{{--                        --}}{{--                        <div x-text="files? files.map(file => file.name) : 'Choose file'"></div>--}}
{{--                    </label>--}}

                </fieldset>
            </form>
        </article>
    </div>
</x-app-layout>
