@extends('layouts.app')
@section('content')
<h1 class="text-center text-success">Listes Des Films</h1>
<div class="w-100  ">
@foreach($post as $film)

<div class="card mx-auto mt-4" style="width: 18rem;">
  <img src="{{url('assets/img/'.$film->poster)}} " class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{ $film->titre }}</h5>
    <p class="card-text">{{ $film->dateSortie }} </p>
    <a  href=" {{ route('users.show',$film->id) }}" class="btn btn-success">Plus info</a>
  </div>
</div>

@endforeach
</div>
@endsection