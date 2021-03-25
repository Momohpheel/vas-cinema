<?php


namespace App\Repositories;

use Illuminate\Http\Request;
interface CinemaRepositoryInterface{

    public function index();
    
  
    public function viewMovies();
    
    
    public function view($id);
    
    
    public function addMovies(Request $request);
    
}
