@extends('layouts.admin')

@section('navigation')
  @include('dashboard.partials.header')
@endsection

@section('content')
  <div class="container">

    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if (session('error'))
      <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        {{session('error')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <a href="{{route('jobs.create')}}" class="btn btn-primary my-3">Kreiraj job</a>
    <table class="table">
      <thead>
        <tr>
          <th>Naziv</th>
          <th>Opis</th>
          <th>Akcije</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($jobs as $job)
            <tr>
              <td>{{$job->naziv}}</td>
              <td>{{$job->opis}}</td>
              <td style="display: flex; column-gap: 1em;">
                <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-sm btn-primary">Uredi</a>
                <form style="display: inline;" action="{{ route('jobs.delete', $job->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger">Obrisi</button>
                </form>
              </td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection