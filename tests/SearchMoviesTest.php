<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../src/MovieService.php';

Class SearchMoviesTest extends TestCase
{

    public function testSearchMovies()
    {
        $query = "Inception";
        $expectedResult = [
            ["id" => "1", "title" => "Inception", "cast" => ["Leonardo DiCaprio", "Joseph Gordon-Levitt"], "category" => "Action", "release_date" => "2010-07-16", "budget" => 160000000]
        ];
        $this->assertEquals($expectedResult, MovieService::searchMovies($query));

        $query = "Leonardo DiCaprio";
        $expectedResult = [
            ["id" => "1", "title" => "Inception", "cast" => ["Leonardo DiCaprio", "Joseph Gordon-Levitt"], "category" => "Action", "release_date" => "2010-07-16", "budget" => 160000000],
            ["id" => "20", "title" => "The Departed", "cast" => ["Leonardo DiCaprio", "Matt Damon"], "category" => "Crime", "release_date" => "2006-10-06", "budget" => 90000000]
        ];
        $this->assertEquals($expectedResult, MovieService::searchMovies($query));

        $query = "Sci-Fi";
        $expectedResult = [
            ["id" => "2", "title" => "Interstellar", "cast" => ["Matthew McConaughey", "Anne Hathaway"], "category" => "Sci-Fi", "release_date" => "2014-11-07", "budget" => 165000000]
        ];
        $this->assertEquals($expectedResult, MovieService::searchMovies($query));

        $query = "Fantasy";
        $expectedResult = [];
        $this->assertEquals($expectedResult, MovieService::searchMovies($query));
    }

}

?>