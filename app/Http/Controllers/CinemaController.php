<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Showtime;
use App\Models\User;
use App\Repositories\CinemaRepositoryInterface;
use Illuminate\Support\Facades\Auth;


class CinemaController extends Controller
{

    protected $repository;

    
    public function __construct(CinemaRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(){
        $movies = $this->repository->index();
        return view('home')->with('movies',$movies);
    }
   
    /**
     * 
     * 
     */
    public function viewMovies(){
        $movies = $this->repository->index();
        return view('welcome')->with('movies',$movies);
        
    }

    /**
     * 
     * 
     */
    public function view($id){
       
        $movies = $this->repository->view($id);
        return view('movies')->with('movies',$movies);
    }


    public function getAddMoviesPage(){
        if (Auth::check()) {
            $cinemas = $this->repository->getAddMoviesPage();
            return view('addmovies')->with('cinemas', $cinemas);
        }else{
            return redirect('/login');
        }
      
    }


    /**
     * 
     * 
     */
    public function addMovies(Request $request){
        if (Auth::check()) {
            $movies = $this->repository->addMovies($request);
            return redirect('/home');
        }else{
            return redirect('/login');
        }
    }

}
