<?php
require_once __DIR__ . '/../src/User.php';
session_start();



if($_SERVER['REQUEST_METHOD'] == "GET"){
    $query = $_GET['query'];
    

    if(isset($_SESSION["users"]) && isset($_SESSION["registered_emails"])) {
        $email = $_SESSION["registered_emails"][0];
        $user = $_SESSION["users"][$email];
    }

    $fav_movies = $user->getFavorites();
    
    if(isset($query)){
        $results = $user->searchFavorites($query);
        include("fav_search_result_view.php");
        exit;
    }
}

header("location: fav_search_result_view.php");
exit;

?>