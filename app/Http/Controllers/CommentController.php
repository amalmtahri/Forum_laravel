<?php

namespace App\Http\Controllers;
use App\Models\Film;
use App\Models\Comment;
use Illuminate\Http\Request;
use Auth;

class CommentController extends Controller
{
    public function index()
    {   
        $listfilm = Film::all();
        return view('user.index',['post'=>$listfilm]);
    }
    public function show($id)
    {
        $film = Film::find($id);
        // $comment = Comment::all();
        $comment = Comment::where('film_id','=',$id)->get();
        return view('user.post',['idF'=>$film,'comments'=>$comment]);
    }
    public function store(Request $request)
    {
        $id_film= $request->input('id_film');
       $comment = new Comment();
       $comment->commentaire = $request->input('commentaire');
       $comment->user_id = Auth::user()->id;
       $comment->film_id = $request->input('id_film');
       $comment->save();
       return redirect(route('users.show',$id_film));
    }
    public function update(Request $request , $id)
    {
        $id_film= $request->input('id_film');
        $comment = Comment::find($id);
        $comment->commentaire = $request->input('commentaire');
        $comment->save();
        return redirect(route('users.show',$id_film));
    }
    public function destroy(Request $request, $id)
    {
        $id_film= $request->input('id_film');
        $comment = Comment::find($id);
        $comment->delete();
        return redirect(route('users.show',$id_film));
    }
}
