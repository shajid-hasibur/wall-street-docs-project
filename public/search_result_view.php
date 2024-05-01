<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h2 class="mb-0">Search Results</h2>
            <a href="movie_list.php" class="btn btn-primary">Return</a>
        </div>
        <?php if (!empty($results)): ?>
            <div class="row">
                <?php foreach ($results as $movie): ?>
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <form action="addToFav.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $movie['id']; ?>">
                                    <h5 class="card-title"><?php echo $movie['title']; ?></h5>
                                    <p class="card-text">Cast: <?php echo implode(', ', $movie['cast']); ?></p>
                                    <p class="card-text">Category: <?php echo $movie['category']; ?></p>
                                    <p class="card-text">Release Date: <?php echo $movie['release_date']; ?></p>
                                    <p class="card-text">Budget: <?php echo $movie['budget']; ?></p>
                                    <button type="submit" class="btn btn-primary">Add to Favorites</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No results found.</p>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
