<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Showtime;
use App\Models\User;



class CinemaController extends Controller
{
    public function login(){}
    public function register(){}

    /**
     * 
     * 
     */
    public function viewMovies(){
        $movies = Movie::all();
        return view('welcome')->with('movies',$movies);
        
    }

    /**
     * 
     * 
     */
    public function view($id){
        // $movies = Movie::all();
        // foreach($movies as $movie){
            $showtime = Showtime::where('movie_id', $id)->with(['cinema','movie'])->get();
        //}

        return $showtime;
    }

    /**
     * 
     * 
     */
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
