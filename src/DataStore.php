<?php

class DataStore {
    public static $movies = [];

    public static function init() {
        self::$movies = [
            ["id" => "1", "title" => "Inception", "cast" => ["Leonardo DiCaprio", "Joseph Gordon-Levitt"], "category" => "Action", "release_date" => "2010-07-16", "budget" => 160000000],
            ["id" => "2", "title" => "Interstellar", "cast" => ["Matthew McConaughey", "Anne Hathaway"], "category" => "Sci-Fi", "release_date" => "2014-11-07", "budget" => 165000000],
            ["id" => "3", "title" => "The Dark Knight", "cast" => ["Christian Bale", "Heath Ledger"], "category" => "Action", "release_date" => "2008-07-18", "budget" => 185000000],
            ["id" => "4", "title" => "The Shawshank Redemption", "cast" => ["Tim Robbins", "Morgan Freeman"], "category" => "Drama", "release_date" => "1994-09-23", "budget" => 25000000],
            ["id" => "5", "title" => "Pulp Fiction", "cast" => ["John Travolta", "Uma Thurman"], "category" => "Crime", "release_date" => "1994-10-14", "budget" => 8000000],
            ["id" => "6", "title" => "The Godfather", "cast" => ["Marlon Brando", "Al Pacino"], "category" => "Crime", "release_date" => "1972-03-24", "budget" => 6000000],
            ["id" => "7", "title" => "The Godfather: Part II", "cast" => ["Al Pacino", "Robert De Niro"], "category" => "Crime", "release_date" => "1974-12-20", "budget" => 13000000],
            ["id" => "8", "title" => "The Dark Knight Rises", "cast" => ["Christian Bale", "Tom Hardy"], "category" => "Action", "release_date" => "2012-07-20", "budget" => 250000000],
            ["id" => "9", "title" => "Fight Club", "cast" => ["Brad Pitt", "Edward Norton"], "category" => "Drama", "release_date" => "1999-10-15", "budget" => 63000000],
            ["id" => "10", "title" => "Forrest Gump", "cast" => ["Tom Hanks", "Robin Wright"], "category" => "Drama", "release_date" => "1994-07-06", "budget" => 55000000],
            ["id" => "11", "title" => "The Matrix", "cast" => ["Keanu Reeves", "Laurence Fishburne"], "category" => "Action", "release_date" => "1999-03-31", "budget" => 63000000],
            ["id" => "12", "title" => "Gladiator", "cast" => ["Russell Crowe", "Joaquin Phoenix"], "category" => "Action", "release_date" => "2000-05-05", "budget" => 103000000],
            ["id" => "13", "title" => "Goodfellas", "cast" => ["Robert De Niro", "Ray Liotta"], "category" => "Crime", "release_date" => "1990-09-19", "budget" => 25000000],
            ["id" => "14", "title" => "The Lord of the Rings: The Return of the King", "cast" => ["Elijah Wood", "Ian McKellen"], "category" => "Adventure", "release_date" => "2003-12-17", "budget" => 94000000],
            ["id" => "15", "title" => "Saving Private Ryan", "cast" => ["Tom Hanks", "Matt Damon"], "category" => "War", "release_date" => "1998-07-24", "budget" => 70000000],
            ["id" => "16", "title" => "Schindler's List", "cast" => ["Liam Neeson", "Ben Kingsley"], "category" => "Drama", "release_date" => "1993-12-15", "budget" => 22000000],
            ["id" => "17", "title" => "The Lord of the Rings: The Two Towers", "cast" => ["Elijah Wood", "Ian McKellen"], "category" => "Adventure", "release_date" => "2002-12-18", "budget" => 94000000],
            ["id" => "18", "title" => "Se7en", "cast" => ["Morgan Freeman", "Brad Pitt"], "category" => "Crime", "release_date" => "1995-09-22", "budget" => 33000000],
            ["id" => "19", "title" => "The Silence of the Lambs", "cast" => ["Jodie Foster", "Anthony Hopkins"], "category" => "Crime", "release_date" => "1991-02-14", "budget" => 19000000],
            ["id" => "20", "title" => "The Departed", "cast" => ["Leonardo DiCaprio", "Matt Damon"], "category" => "Crime", "release_date" => "2006-10-06", "budget" => 90000000],
        ];
    }
}

DataStore::init();

?>
