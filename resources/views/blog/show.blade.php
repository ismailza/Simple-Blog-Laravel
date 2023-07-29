@extends('layout.layout')

@section('title', $post->title)

@section('content')

  <article class="article">
    <h1>{{ $post->title }}</h1>
    <h5 class="text-body-secondary">{{ $post->slug }}</h5>
    <h6 class="text-body-dark">{{ $post->category->name }}</h6>
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
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <a href="{{ route('blog.edit', ['post'=>$post])}}" class="btn btn-warning me-md-2" type="button">Update</a>
      <a class="btn btn-danger" type="button">Delete</a>
    </div>
  </article>
  <a href="{{ route('blog.index') }}" class="btn btn-primary float-end mt-2">Retour</a>

@endsection