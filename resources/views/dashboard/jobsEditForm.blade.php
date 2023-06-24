@extends('layouts.admin')

@section('navigation')
  @include('dashboard.partials.header')
@endsection

@section('content')
  <div class="container">
    <h1 class="text-center m-5">Uredi job</h1>

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

    <form action="{{ route('jobs.update', $job->id) }}" method="post" enctype="multipart/form-data" >
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="naziv" class="form-label">Naziv</label>
        <input type="text" name="naziv" id="naziv" class="form-control" value="{{ $job->naziv }}" required >
      </div>
      <div class="mb-3">
        <label for="opis" class="form-label">Opis</label>
        <textarea class="form-control" name="opis" id="opis" cols="30" rows="10" required>{{ $job->opis }}</textarea>
      </div>
            <div class="mb-3">
        <label for="kategorija" class="form-label">Kategorija</label>
        <select name="kategorija" id="kategorija" class="form-control">
          <option value="{{$job->category->id}}">{{$job->category->naziv}}</option>    
          @foreach ($kategorije as $kategorija)
              @if ($job->category_id != $kategorija->id)
                  <option value="{{$kategorija->id}}">{{$kategorija->naziv}}</option>
              @endif
          @endforeach
        </select>
      </div>
       @if ($job->slika)
          <div class="mb-3">
            <label for="trenutna-slika">Trenutn slika:</label>
            <img id="trenutna-slika" src="{{asset('storage/slike/' . $job->slika)}}" alt="job photo" style="max-width: 300px;" >
          </div>
      @else
          <div class="mb-3">
            <p>Trenutno nema slike.</p>
          </div>
      @endif
      <div class="mb-3">
        <label for="slika" class="form-label">Nova slika:</label>
        <input type="file" name="slika" id="slika" class="form-control" >
      </div>
      <button type="submit" class="btn btn-primary">Spremi</button>
    </form>
  </div>
@endsection