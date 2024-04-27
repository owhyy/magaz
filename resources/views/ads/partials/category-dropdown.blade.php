<select name="category" autocomplete="category" required>
    <option value="general">General</option>

    {{--                            TODO: add category model and make this owrk --}}
    {{--                            @foreach (Category::all() as $category) --}}
    {{--                                <option value="{{ $category->title }}">{{ ucfirst($category->title) }}</option> --}}
    {{--                            @endforeach --}}

</select>
