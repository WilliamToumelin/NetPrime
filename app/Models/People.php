<?php

namespace App\Models;

use App\Models\CoreModel;
use App\Utils\Database;
use PDO;

class People extends CoreModel
{
    private $name;
    private $picture_url;

    public static function find($id)
    {
        $sql = 'SELECT * FROM `people` WHERE id = ' . $id;
		$pdo = Database::getPDO();
		$pdoStatement = $pdo->query($sql);
		$people = $pdoStatement->fetchObject('App\Models\People');
        return $people;
    }
    
    public function moviesPlayedIn()
    {
        $sql = "
            SELECT DISTINCT movies.*
            FROM `movies` 
            INNER JOIN `movie_actors` ON `movies`.`id` = `movie_id`
            WHERE actor_id = $this->id";
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);
        $resultSearch = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Movie');
        return $resultSearch;
    }

    public function moviesDirected()
    {
        $sql = "
            SELECT *
            FROM `movies`
            WHERE `director_id`  = $this->id";
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);
        $resultSearch = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Movie');
        return $resultSearch;
    }

    public function moviesComposed()
    {
        $sql = "
            SELECT *
            FROM `movies`
            WHERE `composer_id` = $this->id";
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);
        $resultSearch = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Movie');
        return $resultSearch;
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
