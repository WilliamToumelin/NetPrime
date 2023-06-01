<?php

namespace App\Models;

use App\Models\CoreModel;
use App\Utils\Database;

class Movie_actors extends CoreModel
{   
    protected $actor_id;
    protected $movie_id;
    protected $order;
    
    public function findAll() 
    {

    }

    public function find()
    {

    }

    public function __construct()
    {

    }
    
    /**
     * Get the value of actor_id
     */ 
    public function getActor_id()
    {
        return $this->actor_id;
    }

    /**
     * Set the value of actor_id
     *
     * @return  self
     */ 
    public function setActor_id($actor_id)
    {
        $this->actor_id = $actor_id;

        return $this;
    }

    /**
     * Get the value of movie_id
     */ 
    public function getMovie_id()
    {
        return $this->movie_id;
    }

    /**
     * Set the value of movie_id
     *
     * @return  self
     */ 
    public function setMovie_id($movie_id)
    {
        $this->movie_id = $movie_id;

        return $this;
    }

    /**
     * Get the value of order
     */ 
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set the value of order
     *
     * @return  self
     */ 
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }
}