<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cinemark";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT user_id FROM user WHERE username = ? AND password = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $_SESSION["loggedin"] = true;
        $_SESSION["user_id"] = $result->fetch_assoc()["user_id"];
        $_SESSION["username"] = $username;

        header("location: movie-list.php");
    } else {
        echo "Invalid username or password";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <form method="post" action="">
        <label for="username">username:</label>
        <input type="username" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>