<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/User.php';
require_once __DIR__ . '/../src/DataStore.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    if (isset($_POST['id'])) {
        $idFieldName = "id";
        $movie = null;
        foreach (DataStore::$movies as $movieData) {
            if (isset($movieData[$idFieldName]) && $movieData[$idFieldName] == $_POST['id']) {
                $movie = $movieData;
                break;
            }
        }

        if ($movie !== null) {
            if(isset($_SESSION["users"]) && isset($_SESSION["registered_emails"])) {
                $email = $_SESSION["registered_emails"][0];
                $user = $_SESSION["users"][$email];
            }
        

            if ($user->isMovieInFavorites($movie['id'])) {
                $_SESSION['error'] = "Movie '{$movie['title']}' is already added to favorites.";
                header("Location: movie_list.php");
                exit;
            }

            
            $user->addToFavorites($movie);

            $_SESSION['success'] = "Movie '{$movie['title']}' added to favorites.";
            header("Location: movie_list.php");
            exit;
        } else {
            $_SESSION['error'] = "Movie with ID '{$_POST['id']}' not found.";
            header("Location: movie_list.php");
            exit;
        }
    } else {
        $_SESSION['error'] = "Movie ID is required.";
        header("Location: movie_list.php");
        exit;
    }
} else {
    echo "Invalid request method.";
}
?>
