@extends('layouts.layout')

@section('navigation')
  @include('partials.header')
@endsection

@section('content')
  <div class="container">
    <h1>Dobrodosli oglasnu tablu poslova</h1>
    <div class="row row-gap-3">
      @foreach ($jobs as $job)
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{$job->naziv}}</h5>
              <p class="card-text">{{$job->opis}}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection