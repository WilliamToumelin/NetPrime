<?php

namespace App\Controllers;

use App\Controllers\CoreController;
use App\Models\Movie;
use App\Models\Movie_actors;
use App\Models\People;
use App\Models\CoreModel;

class MainController extends CoreController {

    public function homeAction()
    {
        $this->show('home');
    }

    public function searchAction($viewData = [])
    {
        $viewData['searchMovies'] = Movie::searchByTitle();
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