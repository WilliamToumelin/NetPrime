<?php

namespace App\Models;

use App\Models\CoreModel;
use App\Utils\Database;

use PDO;

class Movie extends CoreModel
{
    protected $id;
    protected $release_date;
    protected $title;
    protected $synopsis;
    protected $rating;
    protected $poster_url;
    protected $background_url;
    protected $director_id;
    protected $composer_id;
    protected $director_name;
    protected $director_picture;
    protected $composer_name;
    protected $composer_picture;
    protected $name;
    protected $picture_url;

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

    /**
     * Get the value of director_name
     */ 
    public function getDirector_name()
    {
        return $this->director_name;
    }

    /**
     * Set the value of director_name
     *
     * @return  self
     */ 
    public function setDirector_name($director_name)
    {
        $this->director_name = $director_name;

        return $this;
    }

    /**
     * Get the value of director_picture
     */ 
    public function getDirector_picture()
    {
        return $this->director_picture;
    }

    /**
     * Set the value of director_picture
     *
     * @return  self
     */ 
    public function setDirector_picture($director_picture)
    {
        $this->director_picture = $director_picture;

        return $this;
    }

    /**
     * Get the value of composer_name
     */ 
    public function getComposer_name()
    {
        return $this->composer_name;
    }

    /**
     * Set the value of composer_name
     *
     * @return  self
     */ 
    public function setComposer_name($composer_name)
    {
        $this->composer_name = $composer_name;

        return $this;
    }

    /**
     * Get the value of composer_picture
     */ 
    public function getComposer_picture()
    {
        return $this->composer_picture;
    }

    /**
     * Set the value of composer_picture
     *
     * @return  self
     */ 
    public function setComposer_picture($composer_picture)
    {
        $this->composer_picture = $composer_picture;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of picture_url
     */ 
    public function getPicture_url()
    {
        return $this->picture_url;
    }

    /**
     * Set the value of picture_url
     *
     * @return  self
     */ 
    public function setPicture_url($picture_url)
    {
        $this->picture_url = $picture_url;

        return $this;
    }
}