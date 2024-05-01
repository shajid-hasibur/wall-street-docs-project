<?php

use PHPUnit\Framework\TestCase;

class AddFavoriteTest extends TestCase
{
    public function testAddMovieToFavorites()
    {
        session_start();

        $user = new User("test@example.com");
        $_SESSION["registered_emails"] = ["test@example.com"];
        $_SESSION["users"] = ["test@example.com" => $user];
        $movieToAdd = DataStore::$movies[0];

        $_SERVER["REQUEST_METHOD"] = "POST";
        $_POST['id'] = $movieToAdd['id'];

        require_once __DIR__ . '/../public/addToFav.php';
        $this->assertTrue($user->isMovieInFavorites($movieToAdd['id']));

        session_destroy();
    }

    public function testAddMovieToFavoritesDuplicate()
    {
        session_start();

        $user = new User("test@example.com");
        $user->addToFavorites("Inception");
        $_SESSION["registered_emails"] = ["test@example.com"];
        $_SESSION["users"] = ["test@example.com" => $user];

        $movieToAdd = DataStore::$movies[0];

        $_SERVER["REQUEST_METHOD"] = "POST";
        $_POST['id'] = $movieToAdd['id'];

        require_once __DIR__ . '/../public/addToFav.php';

        $this->assertArrayHasKey('error', $_SESSION);

        session_destroy();
    }
}
?>