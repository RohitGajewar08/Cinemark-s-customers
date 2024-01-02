<?php
require 'db_connection.php';

// Check if the movie_id is provided in the URL
if (isset($_GET['id'])) {
    $movie_id = $_GET['id'];

    // Retrieve movie details from the database based on movie_id
    $query = "SELECT * FROM movie WHERE movie_id = $movie_id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $movie = $result->fetch_assoc();
    } else {
        // Handle movie not found
        echo "Movie not found.";
        exit();
    }

    // Check if the delete button is clicked
    if (isset($_POST['delete_movie'])) {
        $delete_query = "DELETE FROM movie WHERE movie_id = $movie_id";

        if ($conn->query($delete_query)) {
            // Redirect to Movie-list.php after successful deletion
            header("Location: Movie-list.php");
            exit();
        } else {
            echo "Error deleting movie: " . $conn->error;
        }
    }
} else {
    // Handle case where movie_id is not provided in the URL
    echo "Invalid request.";
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo $movie['title']; ?> Details</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            width: 100%;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        body {
            margin-top: 20px;
        }

        h2 {
            font-size: 40px;
        }

        .container {
            width: 70%;
            margin: auto;
            display: flex;
            gap: 30px;
            align-items: flex-end;
            border: 3px solid #ddd;
        }

        .image {
            width: 25%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 30px;
        }
        
        .image img {
            width: 100%;
            height: auto;
        }

        .info {
            width: 70%;
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin: 30px;
        }

        .rating {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .rating img {
            width: 30px;
            height: 30px;
        }

        .rating p {
            font-size: 20px;
        }

        #rest {
            font-size: 20px;
        }

        li {
            float: left;
            display: block;
            padding: 14px 16px;
        }

        .button {
            width: 70%;
            margin: auto;
            display: flex;
            justify-content: right;
        }

        .button a, .delete_movie {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border-radius: 20px;
            text-decoration: none;
        }

        .yearLi {
            padding-left: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="image">
            <img src="<?php echo $movie['image']; ?>" alt="<?php echo $movie['title']; ?>">
        </div>
        <div class="info">
            <h2><?php echo $movie['title']; ?></h2>
            <div class="rating">
                <img src="images/star.svg" alt='StarIcon'>
                <p><?php echo $movie['rating']; ?> / 10</p>
            </div>

            <div id="rest">
                <ul>
                    <li class="yearLi"><?php echo $movie['release_year']; ?></li>
                    <li><?php echo $movie['genre']; ?></li>
                    <li><?php echo $movie['budget']; ?></li>
                    <li><?php echo $movie['runtime']; ?></li>
                </ul>
            </div>
            <p>Director: <?php echo $movie['director']; ?></p>
            <p>About: <?php echo $movie['description']; ?></p>

            <!-- Add a form with a delete button -->
            <form method="post">
                <button type="submit" name="delete_movie" class="delete_movie">Delete Movie</button>
            </form>
        </div>
        
    </div>
    <div class="button">
        <a href="Movie-list.php">Back to Movie List</a>
    </div>
</body>

</html>
