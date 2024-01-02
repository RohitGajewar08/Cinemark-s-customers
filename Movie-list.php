<?php
require 'db_connection.php';
$query = "SELECT * FROM movie";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Movie List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        nav {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav li {
            display: inline;
            margin-right: 20px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        img {
            max-width: 100px;
            max-height: 100px;
            cursor: pointer;
        }

        .add_movie {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border-radius: 20px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a class="add_movie" href="Movie-add.php">Add a new movie</a></li>
        </ul>
    </nav>
    <table>
        <tr>
            <th>Image</th>
            <th>Name</th>
        </tr>
        <?php while ($movie = $result->fetch_assoc()): ?>
        <tr>
            <td><a href="Movie-details.php?id=<?php echo $movie['movie_id']; ?>"><img src="<?php echo $movie['image']; ?>" alt="<?php echo $movie['title']; ?>"></a></td>
            <td><?php echo $movie['title']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
