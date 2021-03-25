<?php


namespace App\Repositories;
use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Showtime;
use App\Models\User;
use Illuminate\Http\Request;

class CinemaRepository implements CinemaRepositoryInterface{

    public function index(){
        $movies = Movie::all();
        return $movies;
        
    }

    public function viewMovies(){
        $movies = Movie::all();
        return $movies;
        
    }
    
    public function view($id){
        $showtime = Showtime::where('movie_id', $id)->with(['cinema','movie'])->get();
        return $showtime;
    }
    
    public function getAddMoviesPage(){
        $cinemas = Cinema::all();
        return $cinemas;
    }

    public function addMovies(Request $request){
    
        try{
    
            $validated = $request->validate([
                'movie' => 'required|string',
                'desc' => 'required|string',
                'time' => 'required',
                'cinema_id' => 'required',
            ]);
            $movie = new Movie;
            $movie->name = $validated['movie'];
            $movie->save();

            $showtime = new Showtime;
            $showtime->time = $validated['time'];
            $showtime->cinema_id = $validated['cinema_id'];
            $showtime->movie_id = $movie->id;
            $showtime->save();
    
            
    
        }catch(Exception $e){
            
        }
        
    
    
    
    }
    
}
