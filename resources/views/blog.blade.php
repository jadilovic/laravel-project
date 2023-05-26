@extends('layouts.blogLayout')

@section('navigation')
  @include('partials.navigation')
@endsection

@section('content')
<div class="container">
  <h1>Dobrodosli na blog</h1>
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Novosti 1</h5>
          <p class="card-text">Opis novosti 1</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Novosti 2</h5>
          <p class="card-text">Opis novosti 2</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Novosti 3</h5>
          <p class="card-text">Opis novosti 3</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Novosti 4</h5>
          <p class="card-text">Opis novosti 4</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection