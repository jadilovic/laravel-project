@extends('layouts.layout')

@section('navigation')
  @include('partials.header')
@endsection

@section('content')
  <div class="container">
    <h1>Filtrirani blogovi</h1>
    <div class="row">
      <div class="col-md-12">
        <div class="btn-group" role="group" aria-label="Kategorije">
          @foreach ($categories as $category)
              <a href="{{route('blogs.filter', ['category' => $category->id])}}" class="btn btn-primary">{{$category->naziv}}</a>
          @endforeach
        </div>
      </div>
    </div>
    <div class="row row-gap-3">
      @foreach ($blogs as $blog)
        <div class="col-md-4">
          <div class="card">
            @if ($blog->slika)
                <img src="{{asset('storage/slike/' . $blog->slika)}}" class="card-img-top" alt="{{$blog->naziv}}" >
            @endif
            <div class="card-body">
              <h5 class="card-title">{{$blog->naziv}}</h5>
              <p class="card-text">{{$blog->opis}}</p>
              <span>Kategorija: {{$blog->category->naziv}}</span>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection