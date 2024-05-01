<?php
    require_once __DIR__ . '/../src/DataStore.php';
    require_once __DIR__ . '/../src/User.php';

    $movies = DataStore::$movies;
    
    session_start();

    if(isset($_SESSION["users"]) && isset($_SESSION["registered_emails"])) {
        $email = $_SESSION["registered_emails"][0];
        $user = $_SESSION["users"][$email];
    }
    $favorites = $user->getFavorites();
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Listing</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="text-center">
        <span style="background-color: greenyellow;"><?php echo $user->email; ?></span>
    </div>
    <?php
    if (isset($_SESSION['success'])) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
        echo $_SESSION['success'];
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
        unset($_SESSION['success']);
    }

    if (isset($_SESSION['error'])) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
        echo $_SESSION['error'];
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
        unset($_SESSION['error']);
    }
    ?>
    <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h2 class="mb-4">Favorite Movies</h2>
        <a href="movie_list.php" class="btn btn-primary">Return</a>
    </div>  

    <form action="search_in_fav.php" method="get">
        <input type="text" name="query" class="form-control mb-3" placeholder="Type movie name by title, cast or category">
        <div class="col-12 text-center mb-3">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>  
    </form>
    <?php
    $counter = 0;
    if(empty($favorites)){
    ?>
        <h6 class="text-center">No movies added to favorites.</h6>
    <?php
    } else {
        foreach ($favorites as $movie) {
            
            if ($counter % 2 === 0) {
                echo '<div class="row">';
            }
            ?>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <form action="removeFav.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $movie['id']; ?>">
                            <h5 class="card-title"><?php echo $movie['title']; ?></h5>
                            <p class="card-text">Cast: <?php echo implode(', ', $movie['cast']); ?></p>
                            <p class="card-text">Category: <?php echo $movie['category']; ?></p>
                            <p class="card-text">Release Date: <?php echo $movie['release_date']; ?></p>
                            <p class="card-text">Budget: <?php echo $movie['budget']; ?></p>
                            <button type="submit" class="btn btn-danger">Remove from favorites</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            if ($counter % 2 !== 0 || $counter === count($movies) - 1) {
                echo '</div>';
            }
            $counter++;
        }
    }
    ?>
</div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
