<?php
require 'db_connection.php';

// Define allowed image file extensions
$allowed_extensions = ['jpg', 'jpeg', 'png'];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $director = $_POST['director'];
    $release_year = $_POST['release_year'];
    $budget = $_POST['budget'];
    $runtime = $_POST['runtime'];
    $rating = $_POST['rating'];
    $genre = $_POST['genre'];

    // Validate and handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);

        // Check if the image extension is allowed
        if (in_array(strtolower($image_extension), $allowed_extensions)) {
            $image_path = 'uploads/' . uniqid() . '.' . $image_extension;

            // Move the uploaded image to the desired folder
            if (move_uploaded_file($image_tmp, $image_path)) {
                // Insert movie details into the database
                $query = "INSERT INTO movie (title, description, director, release_year, budget, runtime, rating, genre, image) 
                          VALUES ('$title', '$description', '$director', '$release_year', '$budget', '$runtime', '$rating', '$genre', '$image_path')";
                
                if ($conn->query($query)) {
                    header("Location: Movie-list.php");
                    exit();
                } else {
                    echo "Error: " . $conn->error;
                }
            } else {
                echo "Failed to upload image.";
            }
        } else {
            echo "Invalid image format. Allowed formats: JPG, JPEG, PNG.";
        }
    } else {
        echo "Please choose an image.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Movie</title>
    <style>body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            width: 50%;
            margin: auto;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        input[type="file"] {
            margin-top: 8px;
        }
    </style>
</head>
<body>
    <h2>Add a New Movie</h2>
    <form method="post" enctype="multipart/form-data">
        <label>Title:</label>
        <input type="text" name="title" required><br>

        <label>Description:</label>
        <textarea name="description" required></textarea><br>

        <label>Director:</label>
        <input type="text" name="director" required><br>

        <label>Release Year:</label>
        <input type="text" name="release_year" required><br>

        <label>Budget:</label>
        <input type="text" name="budget" required><br>

        <label>Runtime:</label>
        <input type="text" name="runtime" required><br>

        <label>Rating:</label>
        <input type="text" name="rating" required><br>

        <label>Genre:</label>
        <input type="text" name="genre" required><br>

        <label>Image:</label>
        <input type="file" name="image" accept="image/jpeg, image/jpg, image/png" required><br>

        <button type="submit">Add Movie</button>
        
    </form>
</body>
</html>
