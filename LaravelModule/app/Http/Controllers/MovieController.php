<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Movie;
use App\Http\Resources\Movie as MovieResource;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::paginate(15);
        return response(MovieResource::collection($movies));
    }
    
    public function store(Request $request)
    {
        $movie = $request->isMethod('put') ? Movie::findOrFail
        ($request->movie_id) : new Movie;
        $movie->id=$request->input('movie_id');
        $movie->title=$request->input('title');
        $movie->body=$request->input('body');

        if($movie->save()){
            return new MovieResource($movie);
        }
    }

    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return new MovieResource($movie);
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        if($movie->delete()){
            return new MovieResource($movie);
        }  
    }
}
