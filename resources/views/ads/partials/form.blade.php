<form action="{{ route('ads.store') }}" method="post">
    @csrf
    <fieldset>
        <label>
            Title
            <input type="text" name="title" placeholder="Title" autocomplete="title" required />
        </label>
        <label>
            Description
            <textarea name="description" rows="3" placeholder="The characteristics of the thing you're selling, its quality etc."
                      autocomplete="description" required></textarea>
        </label>
        <label>
            Category
            @include('ads.partials.category-dropdown')
        </label>
        <label>
            Thumbnail
            @include('ads.partials.file-upload')
        </label>

        <label>
            Price
            <input type="number" name="price" placeholder="Price (USD)" autocomplete="price" required />
        </label>

        <button type="submit">Submit</button>
    </fieldset>
</form>
