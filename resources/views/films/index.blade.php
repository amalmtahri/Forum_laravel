@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h1>La Liste des Films</h1>
        <div class="pull-right py-4">
        <a href="{{ route('films.create') }}" class="btn btn-success">Nouveau Film</a>
        </div>

        <table class="table">
            <head>
                <tr>
                    <th>Titre</th>
                    <th>Poster</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </head>
            <body>
            @foreach($posts as $film)
                <tr>
                    <td> {{ $film->titre }} </td>
                    <td> <img src="{{url('assets/img/'.$film->poster)}} " class="rounded-circle" width="70px"  alt="">  </td>
                    <td> {{ $film->dateSortie }} </td>
                    <td>
                       
                        <form action="{{ route('films.destroy',$film->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field("DELETE") }}
                        <a href="{{ route('films.edit',$film->id) }}" class="btn btn-warning">Modifier</a>
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </body>
        </table>
        </div>
    </div>
</div>
@endsection