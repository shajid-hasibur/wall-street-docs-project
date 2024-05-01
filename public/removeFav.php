<?php 
require_once __DIR__ . '/../src/User.php';
session_start();


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $movie_id = $_POST['id'];

    if(isset($_SESSION["users"]) && isset($_SESSION["registered_emails"])) {
        $email = $_SESSION["registered_emails"][0];
        $user = $_SESSION["users"][$email];
    }

    if(isset($movie_id)){
        $user->removeFromFavorites($movie_id);
        $_SESSION['success'] = "Movie removed successfully.";
        header("location: fav_list.php");
    }
}
?>