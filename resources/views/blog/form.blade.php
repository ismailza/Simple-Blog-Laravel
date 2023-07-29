<form action="" method="post">
  @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" placeholder="Article title">
    @error('title')
      {{ $message }}
    @enderror
  </div>
  <div class="mb-3">
    <label for="slug" class="form-label">Slug</label>
    <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $post->slug) }}" placeholder="Article slug">
    @error('slug')
      {{ $message }}
    @enderror
  </div>
  <div class="mb-3">
    <label for="category" class="form-label">Category</label>
    <select name="category_id" id="category" class="form-control">
      <option value="" selected disabled>Sélectionner une catégorie</option>
      @foreach ($categories as $category)
        <option @selected(old('category_id', $post->category_id) == $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
    </select>
    @error('category_id')
      {{ $message }}
    @enderror
  </div>
  <div class="mb-3">
    <label for="content" class="form-label">Content</label>
    <textarea class="form-control" id="content" name="content" rows="3" placeholder="Article content">{{ old('content', $post->content) }}</textarea>
    @error('content')
      {{ $message }}
    @enderror
  </div>
  @php
    $tagsIds = $post->tags()->pluck('id');
  @endphp
  <div class="btn-group mb-3" role="group" aria-label="Basic checkbox toggle button group">
    @foreach ($tags as $tag)
      <input @checked($tagsIds->contains($tag->id)) type="checkbox" class="btn-check" name="tags[]" value="{{ $tag->id }}" id="{{ $tag->id }}" autocomplete="off">
      <label class="btn btn-outline-secondary btn-sm m-1" for="{{ $tag->id }}">{{ $tag->name }}</label>
    @endforeach
    @error('tags')
      {{ $message }}
    @enderror
  </div>
  <div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-{{ $btnColor }} m-2">{{ $btnName }}</button>
    <button type="reset" class="btn btn-secondary m-2">Annuler</button>
  </div>
</form>