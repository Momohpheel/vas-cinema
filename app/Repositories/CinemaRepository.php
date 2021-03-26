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
        $showtime = Showtime::where('movie_id', $id)->with('movie')->get();
        return $showtime;
    }
    
    public function getAddMoviesPage(){
      return view('addmovies');
    }

    public function addMovies(Request $request){
    
        try{
            
            $validated = $request->validate([
                'movie' => 'required|string',
                'desc' => 'required|string',
                'time.*' => 'required',
                'cinema.*' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg'
            ]);
       

           
            $movie = new Movie;
            $movie->name = $validated['movie'];
            $movie->desc = $validated['desc'];
            $response = cloudinary()->upload(request()->file('image')->getRealPath())->getSecurePath();
            $movie->image = $response;
            $movie->save();

            for($i = 0; $i < count($validated['time']); $i++){
                $showtime = new Showtime;
                $showtime->time = $validated['time'][$i];
                $showtime->cinema = $validated['cinema'][$i];
                $showtime->movie_id = $movie->id;
                $show[] = $showtime->save();

            }

            if (count($show) == 0){
                $movie = Movie::where('id', $movie->id)->first();
                $movie->delete();
            }
            
    
            
    
        }catch(Exception $e){
            return $e->getMessage();
            
        }
        
    
    
    
    }
    
}
