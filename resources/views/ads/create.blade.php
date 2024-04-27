<x-app-layout>
  <div class="row h-100 justify-content-center align-items-center">
    <div class="col-10 col-md-8 col-lg-6">
      <h3>Add a product</h3>
      <form action="{{ route('ads.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
          <label for="title">Price</label>
          <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
          <label for="body">Description</label>
          <textarea class="form-control" id="description" name="description" rows="3" ></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Create Post</button>
      </form>
    </div>
  </div>
</x-app-layout>
