<?php
require_once __DIR__ . '/../src/User.php';

use PHPUnit\Framework\TestCase;

class RemoveFromFavoritesTest extends TestCase
{
    public function testRemoveMovieFromFavorites()
    {
        $userData = [
            "registered_emails" => ["test@example.com"],
            "users" => [
                "test@example.com" => new User("test@example.com"),
            ],
        ];
        $_SESSION = $userData;

        $_POST['id'] = "2"; 


        require __DIR__ . '/../public/removeFav.php';

        $user = $_SESSION["users"]["test@example.com"];
        $this->assertFalse($user->isMovieInFavorites("2"));
    }
}
?>
