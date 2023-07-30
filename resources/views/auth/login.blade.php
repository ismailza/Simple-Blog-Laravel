@extends('layout.layout')

@section('title', 'Se connecter')

@section('content')

  <div class="m-auto" style="width: 320px;">
    <form action="" method="post" class="vstack gap-1">
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
      @csrf
      <div class="md-4">
        <label for="validationCustom01" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="validationCustom01" value="{{ old('email') }}" placeholder="Your email">
        @error('email')
          {{ $message }}          
        @enderror
      </div>
      <div class="md-4">
        <label for="validationCustom02" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="validationCustom02" placeholder="Your password">
        @error('password')
          {{ $message }}
        @enderror
      </div>
      <div class="form-check text-start my-3">
        <input class="form-check-input" type="checkbox" name="remember" value="true" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          Remember me
        </label>
      </div>
      <div class="mt-4">
        <button class="btn btn-primary w-100" type="submit">Sign in</button>
      </div>
    </form>
  </div>

@endsection