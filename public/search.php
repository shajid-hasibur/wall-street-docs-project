<?php

require_once __DIR__ . '/../src/MovieService.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $query = $_GET['query'];

    if (isset($query)) {
        $results = MovieService::searchMovies($query);
        include('search_result_view.php');
        exit;
    }
}

header("Location: search_result.php");
exit; 
?>
