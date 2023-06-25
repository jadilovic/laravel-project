@extends('layouts.layout')

@section('navigation')
  @include('partials.header')
@endsection

@section('content')
  <div class="container">
    <h1>Dobrodosli na blog</h1>
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
              <a href="{{route('blogs.show', ['blog' => $blog->id])}}" class="btn btn-primary">Detalji</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection