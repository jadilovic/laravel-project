@extends('layouts.admin')

@section('navigation')
  @include('dashboard.partials.header')
@endsection

@section('content')
  <div class="container">
    <h1 class="text-center m-5" >Kreiraj novi blog</h1>
    <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data" >
      @csrf
      <div class="mb-3">
        <label for="naziv" class="form-label">Naziv</label>
        <input type="text" name="naziv" id="naziv" class="form-control" required >
      </div>
      <div class="mb-3">
        <label for="opis" class="form-label">Opis</label>
        <textarea class="form-control" name="opis" id="opis" cols="30" rows="10" required></textarea>
      </div>
      <div class="mb-3">
        <label for="slika" class="form-label">Slika</label>
        <input type="file" name="slika" id="slika" class="form-control" >
      </div>
      <button type="submit" class="btn btn-primary">Kreiraj</button>
    </form>
  </div>
@endsection