<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Showtime;
use App\Models\User;
use App\Repositories\CinemaRepositoryInterface;



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
        $cinemas = $this->repository->getAddMoviesPage();
        return view('addmovies')->with('cinemas', $cinemas);
    }


    /**
     * 
     * 
     */
    public function addMovies(Request $request){
        $movies = $this->repository->addMovies($request);
        return redirect('/home');
    }

}
