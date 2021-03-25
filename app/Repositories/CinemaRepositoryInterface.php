<?php


namespace App\Repositories;

interface CinemaRepositoryInterface{

    public function index();
    
  
    public function viewMovies();
    
    
    public function view($id);
    
    
    public function addMovies();
    
}
