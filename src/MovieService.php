<?php
require_once 'DataStore.php';

class MovieService {
    public static function searchMovies($query) {
        $results = array_filter(DataStore::$movies, function ($movie) use ($query) {
            return stripos($movie['title'], $query) !== false || 
                   in_array($query, $movie['cast']) || 
                   stripos($movie['category'], $query) !== false;
        });
        usort($results, function ($a, $b) {
            return strcmp($a['title'], $b['title']);
        });
        return $results;
    }
}
?>
