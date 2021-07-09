@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action=" {{ route('films.store') }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}
                <div class="form-group">
                <label for="">Titre</label>
                <input type="text" name="titre" class="form-control">
                </div>
                <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image"  accept=".png, .jpg, .jpeg" class="form-control">
                </div>
                <div class="form-group">
                <label for="">Date</label>
                <input type="date" name="date" class="form-control">
                </div>
                <input type="submit" value="Enregistrer" class="btn btn-primary mt-4">

            </form>
        </div>
    </div>
</div>

@endsection