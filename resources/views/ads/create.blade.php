<x-app-layout>
    <div class="container" style="width: 50%">
        <article>
            <h1>Post a new ad</h1>
            <form action="{{ route('ads.store') }}" method="post">
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
                            {{--                            @foreach (Category::all() as $category)--}}
                            {{--                                <option value="{{ $category->title }}">{{ ucfirst($category->title) }}</option>--}}
                            {{--                            @endforeach--}}

                        </select>
                    </label>
                    <label x-data="{ thumbnail: null }">
                        Thumbnail
                        </br>
                        <input x-ref="fileUpload" style="display: none" type="file" id="files"
                               @change="thumbnail = URL.createObjectURL($event.target.files[0]);">
                        <input style="width: 20%" type="button" value="Browse..." @click="$refs.fileUpload.click()" />
                        </br>
                        <img x-show="thumbnail" width="200" height="150" :src="thumbnail"/>
                    </label>

                    <label>
                        Price
                        <input
                            type="number"
                            name="price"
                            placeholder="Price (MDL)"
                            autocomplete="price"
                            required
                        />
                    </label>

                    <button type="submit">Submit</button>
                </fieldset>
            </form>
        </article>
    </div>
</x-app-layout>
