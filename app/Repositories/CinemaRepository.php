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
        return view('home')->with('movies',$movies);
        
    }

    public function viewMovies(){
        $movies = Movie::all();
        return view('welcome')->with('movies',$movies);
        
    }
    
    public function view($id){
        $showtime = Showtime::where('movie_id', $id)->with(['cinema','movie'])->get();
        return $showtime;
    }
    

    public function addMovies(Request $request){
    
        try{
    
            $validated = $request->validate([
                'time' => 'required|string',
                'cinema_id' => 'required',
                'movie_id' => 'required' 
            ]);
    
            $showtime = new Showtime;
            $showtime->time = $validated['time'];
            $showtime->cinema_id = $validated['cinema_id'];
            $showtime->movie_id = $validated['movie_id'];
            $showtime->save();
    
    
        }catch(Exception $e){
            
        }
        
    
    
    
    }
    
}
