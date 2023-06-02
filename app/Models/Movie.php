<?php

namespace App\Models;

use App\Models\CoreModel;
use App\Utils\Database;

use PDO;

class Movie extends CoreModel
{
    private $release_date;
    private $title;
    private $synopsis;
    private $rating;
    private $poster_url;
    private $background_url;
    private $director_id;
    private $composer_id;

    public function findAll() 
    {
    }

    public static function find($id)
    {
        $sql = 'SELECT * FROM `movies` WHERE id = ' . $id;
		$pdo = Database::getPDO();
		$pdoStatement = $pdo->query($sql);
		$movie = $pdoStatement->fetchObject('App\Models\Movie');
        return $movie;
    }

    public static function searchByTitle()
    {   
        $search = $_GET['search'];
        $sql = 'SELECT * FROM `movies` WHERE title LIKE "%' . $search . '%"';
        $pdo = Database::getPDO();
		$pdoStatement = $pdo->query($sql);
		$resultSearch = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Movie'); 
        return $resultSearch;
    }

    public function getDirector(){
        $sql = "
            SELECT `people`.*
            FROM `movies`
            INNER JOIN `people` ON `director_id` = `people`.`id`
            WHERE `movies`.`id` = $this->id
        ";

		$pdoStatement = Database::getPDO()->query($sql);
		return $pdoStatement->fetchObject('App\Models\People');
    }

    public function getComposer(){
        $sql = "
            SELECT `people`.*
            FROM `movies`
            INNER JOIN `people` ON `composer_id` = `people`.`id`
            WHERE `movies`.`id` = $this->id
        ";

		$pdoStatement = Database::getPDO()->query($sql);
		return $pdoStatement->fetchObject('App\Models\People');
    }

    public function getActors()
    {
        $sql = "
            SELECT people.*
            FROM people
            INNER JOIN movie_actors ON people.id = movie_actors.actor_id
            WHERE movie_actors.movie_id = $this->id
        "; 
        $pdo = Database::getPDO();
		$pdoStatement = $pdo->query($sql);
		$actors = $pdoStatement->fetchAll(PDO::FETCH_CLASS,'App\Models\People');
        return $actors;
    }
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of synopsis
     */ 
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * Set the value of synopsis
     *
     * @return  self
     */ 
    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    /**
     * Get the value of rating
     */ 
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set the value of rating
     *
     * @return  self
     */ 
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get the value of poster_url
     */ 
    public function getPoster_url()
    {
        return $this->poster_url;
    }

    /**
     * Set the value of poster_url
     *
     * @return  self
     */ 
    public function setPoster_url($poster_url)
    {
        $this->poster_url = $poster_url;

        return $this;
    }

    /**
     * Get the value of background_url
     */ 
    public function getBackground_url()
    {
        return $this->background_url;
    }

    /**
     * Set the value of background_url
     *
     * @return  self
     */ 
    public function setBackground_url($background_url)
    {
        $this->background_url = $background_url;

        return $this;
    }

    /**
     * Get the value of director_id
     */ 
    public function getDirector_id()
    {
        return $this->director_id;
    }

    /**
     * Set the value of director_id
     *
     * @return  self
     */ 
    public function setDirector_id($director_id)
    {
        $this->director_id = $director_id;

        return $this;
    }

    /**
     * Get the value of composer_id
     */ 
    public function getComposer_id()
    {
        return $this->composer_id;
    }

    /**
     * Set the value of composer_id
     *
     * @return  self
     */ 
    public function setComposer_id($composer_id)
    {
        $this->composer_id = $composer_id;

        return $this;
    }

    /**
     * Get the value of release_date
     */ 
    public function getRelease_date()
    {
        return $this->release_date;
    }

    /**
     * Set the value of release_date
     *
     * @return  self
     */ 
    public function setRelease_date($release_date)
    {
        $this->release_date = $release_date;

        return $this;
    }

}