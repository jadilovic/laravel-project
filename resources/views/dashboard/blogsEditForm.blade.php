@extends('layouts.admin')

@section('navigation')
  @include('dashboard.partials.header')
@endsection

@section('content')
  <div class="container">
    <h1 class="text-center m-5">Uredi blog</h1>

    @if (session('success'))
        <div class="alert alert-success">
          {{session('success')}}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
          {{session('error')}}
        </div>
    @endif

    <form action="{{ route('blogs.update', $blog->id) }}" method="post">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="naziv" class="form-label">Naziv</label>
        <input type="text" name="naziv" id="naziv" class="form-control" value="{{ $blog->naziv }}" required >
      </div>
      <div class="mb-3">
        <label for="opis" class="form-label">Opis</label>
        <textarea class="form-control" name="opis" id="opis" cols="30" rows="10" required>{{ $blog->opis }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">Spremi</button>
    </form>
  </div>
@endsection