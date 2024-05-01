<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/User.php';

class UserTest extends TestCase
{
    private $user;

    protected function setUp(): void
    {
        $this->user = new User("test@example.com");
    }

    public function testCanBeCreatedWithValidEmail()
    {
        $this->assertEquals("test@example.com", $this->user->email);
    }

    public function testCanAddToFavorites()
    {
        $this->user->addToFavorites("Dhaka Attack");
        $this->assertContains("Dhaka Attack", $this->user->getFavorites());
    }

    public function testCanRemoveFromFavorites()
    {
        $this->user->addToFavorites(["id" => "1", "title" => "Inception", "cast" => ["Leonardo DiCaprio", "Joseph Gordon-Levitt"], "category" => "Action", "release_date" => "2010-07-16", "budget" => 160000000]);
        $this->user->removeFromFavorites("1");
        $this->assertNotContains("Inception", $this->user->getFavorites());
    }

    public function testCanCheckIfMovieIsInFavorites()
    {
        $user = new User("test@example.com");

        $user->addToFavorites(["id" => "1", "title" => "Inception", "cast" => ["Leonardo DiCaprio", "Joseph Gordon-Levitt"], "category" => "Action", "release_date" => "2010-07-16", "budget" => 160000000]);
        $user->addToFavorites(["id" => "2", "title" => "Interstellar", "cast" => ["Matthew McConaughey", "Anne Hathaway"], "category" => "Sci-Fi", "release_date" => "2014-11-07", "budget" => 165000000]);
        $user->addToFavorites(["id" => "3", "title" => "The Dark Knight", "cast" => ["Christian Bale", "Heath Ledger"], "category" => "Action", "release_date" => "2008-07-18", "budget" => 185000000]);

        $this->assertTrue($user->isMovieInFavorites("1"));
        $this->assertTrue($user->isMovieInFavorites("2"));
        $this->assertTrue($user->isMovieInFavorites("3"));
        $this->assertFalse($user->isMovieInFavorites("4"));
    }

    public function testCanSearchFavorites()
    {
        $user = new User("test@example.com");

        $user->addToFavorites(["id" => "1", "title" => "Inception", "cast" => ["Leonardo DiCaprio", "Joseph Gordon-Levitt"], "category" => "Action", "release_date" => "2010-07-16", "budget" => 160000000]);
        $user->addToFavorites(["id" => "2", "title" => "Interstellar", "cast" => ["Matthew McConaughey", "Anne Hathaway"], "category" => "Sci-Fi", "release_date" => "2014-11-07", "budget" => 165000000]);
        $user->addToFavorites(["id" => "3", "title" => "The Dark Knight", "cast" => ["Christian Bale", "Heath Ledger"], "category" => "Action", "release_date" => "2008-07-18", "budget" => 185000000]);

        $searchResults1 = $user->searchFavorites("Inception");
        $searchResults2 = $user->searchFavorites("Sci-Fi");
        $searchResults3 = $user->searchFavorites("Action");

        $this->assertEquals([["id" => "1", "title" => "Inception", "cast" => ["Leonardo DiCaprio", "Joseph Gordon-Levitt"], "category" => "Action", "release_date" => "2010-07-16", "budget" => 160000000]], $searchResults1);
        $this->assertEquals([["id" => "2", "title" => "Interstellar", "cast" => ["Matthew McConaughey", "Anne Hathaway"], "category" => "Sci-Fi", "release_date" => "2014-11-07", "budget" => 165000000]], $searchResults2);
        $this->assertEquals([["id" => "1", "title" => "Inception", "cast" => ["Leonardo DiCaprio", "Joseph Gordon-Levitt"], "category" => "Action", "release_date" => "2010-07-16", "budget" => 160000000], ["id" => "3", "title" => "The Dark Knight", "cast" => ["Christian Bale", "Heath Ledger"], "category" => "Action", "release_date" => "2008-07-18", "budget" => 185000000]], $searchResults3);
    }


}
