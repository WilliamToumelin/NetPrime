<?php

namespace App\Controllers;

use App\Controllers\CoreController;
use App\Models\Movie;
use App\Models\People;

class MainController extends CoreController {

    public function homeAction()
    {
        $this->show('home');
    }

    public function searchAction($viewData = [])
    {
        if (isset($_GET['search'])){
            $movies = Movie::searchByTitle();
        } elseif ($id = $_GET['directorId'] ?? false){

            $director = People::find($id);
            $movies = $director->moviesDirected();
            $viewData['director'] = $director;

        } elseif ($id = $_GET['composerId'] ?? false){

            $composer = People::find($id);
            $movies = $composer->moviesComposed();
            $viewData['composer'] = $composer;

        } elseif ($id = $_GET['actorId'] ?? false){

            $actor = People::find($id);
            $movies = $actor->moviesPlayedIn();
            $viewData['actor'] = $actor;
        }

        $viewData['searchMovies'] = $movies;
        $this->show('result', $viewData);
    }

    public function movieAction($viewData = [])
    {
        $movie = Movie::find($viewData['id']);
        $director = $movie->getDirector();
        $composer = $movie->getComposer();
        $actors = $movie->getActors();
        
        $viewData = [
            'movie' => $movie,
            'director' => $director,
            'composer' => $composer,
            'actors' => $actors
        ];
        $this->show('movie', $viewData);
    }
}