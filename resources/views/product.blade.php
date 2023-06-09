@extends('layouts.layout')

@section('navigation')
  @include('partials.header')
@endsection

@section('content')
  <div class="container">
    <h1>Welcome to products gallery</h1>
    <div class="row row-gap-3">
      @foreach ($products as $product)
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{$product->name}}</h5>
              <p class="card-text">{{$product->description}}</p>
              <h6 class="card-text">{{$product->price}}</h6>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection