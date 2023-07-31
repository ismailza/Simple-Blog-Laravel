@extends('layout.layout')

@section('title', $post->title)

@section('content')

  <article class="article">
    <h1>{{ $post->title }}</h1>
    <h5 class="text-body-secondary">{{ $post->slug }}</h5>
    <h6 class="text-body-dark">{{ $post->category->name }}</h6>
    @if ($post->image)
      <img style="width: 100%; max-height: 200px; object-fit: cover;" src="{{ $post->imageUrl() }}" alt="Article image">
    @endif
    <div>
      <p>{{ $post->content }}</p>
    </div>
    @if (!$post->tags->isEmpty())
    <div>
      @foreach ($post->tags as $tag)
        <span class="badge bg-secondary">{{ $tag->name }}</span>
      @endforeach
    </div>
    @endif
    @auth
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <a href="{{ route('blog.edit', ['post'=>$post])}}" class="btn btn-warning btn-sm me-md-2" type="button">Update</a>
      <form action="{{ route('blog.destroy', $post) }}" method="post">
        @csrf
        @method('delete')
        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
      </form>
    </div>
    @endauth
  </article>

@endsection