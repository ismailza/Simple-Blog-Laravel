@extends('layout.layout')

@section('title', 'Creer article')

@section('content')
  <h2>Modifier un article</h2>
  @php
    $btnName = 'Update';
    $btnColor = 'warning';
  @endphp
  @include('blog.form')

@endsection