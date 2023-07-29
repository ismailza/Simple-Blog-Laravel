@extends('layout.layout')

@section('title', 'Creer article')

@section('content')
  <h2>Ajouter un nouveau article</h2>

  @php
    $btnName = 'Save';
    $btnColor = 'primary';
  @endphp
  @include('blog.form')

@endsection