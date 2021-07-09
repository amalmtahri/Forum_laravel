<?php

namespace App\Http\Controllers;
use App\Models\Film;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Auth;
class FilmController extends Controller


{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        if(Auth::user()->role=='admin'){
            $listfilm = Film::all();
            return view('films.index',['posts'=>$listfilm]);
        }
        else{
            dd("pas droit accee");
        }

    }
    public function create()
    {
        return view('films.create');
    }
    // enregistrer un film
    public function store(Request $request)
    {
       $film = new Film();
       $film->titre = $request->input('titre');
        $film->dateSortie = $request->input('date');
        $film->admin_id = Auth::user()->id;
      
     $image = $request->file('image');
     $new_name = rand() . '.' . $image->getClientOriginalExtension();
     $film->poster =$new_name;
    $image->move(public_path('assets/img'), $new_name);
 
    $film->save();
       return redirect('films');
    }
    // affichage de formulaire du donnee modifier 
    public function edit($id)
    {
        $film = Film::find($id);
        return view('films.edit',['idF'=>$film]);
    }
    // enregister la modification
    public function update(Request $request , $id)
    {
        $film = Film::find($id);
        $film->titre = $request->input('titre');
        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $film->poster =$new_name;
       $image->move(public_path('assets/img'), $new_name);
        $film->dateSortie = $request->input('date');
        $film->save();
        return redirect('films');
    }
    public function destroy(Request $request, $id)
    {
        $film = Film::find($id);
        $film->delete();
        return redirect('films');
    }
    
}
