@extends('layouts.layout')

@section('navigation')
  @include('partials.navigation')
@endsection

@section('content')
  <div class="container">
    <h1>Dobrodosli na blog</h1>
    <div class="row row-gap-3">
      @foreach ($blogs as $blog)
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{$blog->naziv}}</h5>
              <p class="card-text">{{$blog->opis}}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection