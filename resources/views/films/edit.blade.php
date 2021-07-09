@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action=" {{ route('films.update',$idF->id) }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">

            {{ csrf_field() }}
                <div class="form-group">
                <img src="{{url('assets/img/'.$idF->poster)}}" class="border border-warning rounded" height="100px"  alt=""><br>
                <label for="">Titre</label>
                <input type="text" name="titre" class="form-control" value="{{ $idF->titre }}">
                </div>
                <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control" >
                </div>
                <div class="form-group">
                <label for="">Date</label>
                <input type="date" name="date" class="form-control" value="{{ $idF->dateSortie }}">
                </div>
                <input type="submit" value="Modifier" class="btn btn-warning mt-4">

            </form>
        </div>
    </div>
</div>

@endsection