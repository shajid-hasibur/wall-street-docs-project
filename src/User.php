<?php

class User{
    public $email;
    private $favorites = [];

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function addToFavorites($movie) {
        $this->favorites[] = $movie;
    }

    public function getFavorites() {
        return $this->favorites;
    }

    public function removeFromFavorites($movieId) {
        
        $this->favorites = array_filter($this->favorites, function($movie) use ($movieId) {
            return $movie['id'] !== $movieId;
        });
    }
    

    public function isMovieInFavorites($movieId) {
        foreach ($this->favorites as $favorite) {
            if ($favorite['id'] == $movieId) {
                return true;
            }
        }
        return false;
    }

    public function searchFavorites($query) {
        $results = array_filter($this->favorites, function($movie) use ($query) {
            return stripos($movie['title'], $query) !== false || 
                   in_array($query, $movie['cast']) || 
                   stripos($movie['category'], $query) !== false;
        });
        
        usort($results, function($a, $b) {
            return strcmp($a['title'], $b['title']);
        });
        
        return $results;
    }
    
}

?>