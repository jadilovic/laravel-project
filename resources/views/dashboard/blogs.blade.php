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

    <a href="{{route('blogs.create')}}" class="btn btn-primary my-3">Kreiraj blog</a>
    <table class="table">
      <thead>
        <tr>
          <th>Naziv</th>
          <th>Opis</th>
          <th>Akcije</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($blogs as $blog)
            <tr>
              <td>{{$blog->naziv}}</td>
              <td>{{$blog->opis}}</td>
              <td>
                <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-primary">Uredi</a>
                <form style="display: inline;" action="{{ route('blogs.delete', $blog->id) }}" method="POST">
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