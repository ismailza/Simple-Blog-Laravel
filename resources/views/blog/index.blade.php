@extends('layout.layout')

@section('title', 'Acceuil')

@section('content')

  <h1>Bienvenue sur mon blog</h1>
  <div class="card-container row">
  @forelse($posts as $post)
    <div class="card m-2" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <h6 class="card-subtitle mb-2 text-body-secondary">{{ $post->slug }}</h6>
        <h6 class="card-subtitle mb-2 text-body-dark"><small>@if ($post->category)Catégorie: {{ $post->category->name }}@endif </small></h6>
        <p class="card-text">{{ \Illuminate\Support\Str::limit($post->content, 120, $end='...') }}</p>
        @if (!$post->tags->isEmpty())
        <div>
          Tags : 
          @foreach ($post->tags as $tag)
            <span class="badge bg-secondary">{{ $tag->name }}</span>
          @endforeach
        </div>
        @endif
        <a href="{{ route('blog.show',['slug' => $post->slug, 'post' => $post->id]) }}" class="card-link float-end">Lire la suite</a>
      </div>
    </div>
  @empty
  <p>Aucun article disponible</p>
  @endforelse
  {{ $posts->links() }}
  </div>

@endsection