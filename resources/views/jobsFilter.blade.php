@extends('layouts.layout')

@section('navigation')
  @include('partials.header')
@endsection

@section('content')
  <div class="container">
    <h1>Filtrirani Jobs</h1>
    <div class="row">
      <div class="col-md-12">
        <div class="btn-group" role="group" aria-label="Kategorije">
          @foreach ($categories as $category)
              <a href="{{route('jobs.filter', ['category' => $category->id])}}" class="btn btn-primary">{{$category->naziv}}</a>
          @endforeach
        </div>
      </div>
    </div>
    <div class="row row-gap-3">
      @foreach ($jobs as $job)
        <div class="col-md-4">
          <div class="card">
            @if ($job->slika)
                <img src="{{asset('storage/slike/' . $job->slika)}}" class="card-img-top" alt="{{$job->naziv}}" >
            @endif
            <div class="card-body">
              <h5 class="card-title">{{$job->naziv}}</h5>
              <p class="card-text">{{$job->opis}}</p>
              <span>Kategorija: {{$job->category->naziv}}</span>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection