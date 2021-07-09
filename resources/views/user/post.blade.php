@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">
        <img src="{{url('assets/img/'.$idF->poster)}} " class="card-img-top" alt="...">
        </div>
        <div class="col-lg-6 justify-content-center ">
        <h1 class="text-center text-success">{{ $idF->titre }}</h1>
        <p class="text-center">{{ $idF->dateSortie }}</p>
        @if(isset(Auth::user()->id))
        <form action="{{ route('users.store') }}" method="post">
        {{ csrf_field() }}

        <input type="hidden" value="{{ $idF->id }}" name="id_film">
        <input class="form-control" type="text" name="commentaire" required/>
        <button class="btn btn-success mt-4" type="submit">Ajouter un commentaire</button>
        </form>
@endif
        <ul>
        @php ($i = 1)
        @foreach( $comments as $comment)
        <li style="list-style:none" ><span id="spn{{$i}}">{{ $comment->commentaire }} </span>
        @if(isset(Auth::user()->id) && isset($comment->user_id))
        @if(Auth::user()->id== $comment->user_id)
        <button class=" btn btn-warning " onclick="modif({{$i}})" id="modif{{$i}}">Modifier</button> 
<!-- modifier -->

        <form action="{{ route('users.update',$comment->id) }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <input type="text" class="form-control" name="commentaire" id="commentaire{{$i}}"  value="{{$comment->commentaire}}" style="display:none"> 
        <input type="hidden" value="{{ $idF->id }}" name="id_film">
        <button type="submit" class="btn btn-success mt-2" style="display:none" id="save{{$i}}">Save</button>
        </form>

        <!-- supprimer -->
        <form action="{{ route('users.destroy',$comment->id) }}" method="post">
        {{ csrf_field() }}
         {{ method_field("DELETE") }}
        <input type="hidden" value="{{ $idF->id }}" name="id_film">
        <button type="submit" class="btn btn-danger " id="sup{{$i}}">Supprimer</button>
        </form>
        @endif
        @endif
         </li>

         @php ($i++)
    @endforeach
        </ul>
        </div>
    </div>
</div>
<script>
function modif(x){
    var commentaire= document.getElementById('commentaire'+x);
    var spn= document.getElementById('spn'+x);
    var modif= document.getElementById('modif'+x);
    var sup= document.getElementById('sup'+x);
    var save= document.getElementById('save'+x);
    commentaire.style="display:block";
    spn.style="display:none";
    modif.style="display:none";
    sup.style="display:none";
    save.style="display:block";
}
</script>


@endsection