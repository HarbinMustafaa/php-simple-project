<?php
$host = "localhost";
$user = "user";
$password = "password";
$database = "phonestore";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("No connection");
}

echo "Connected";

$query = "SELECT * FROM phones";
$result = mysqli_query($conn, $query); // Use $conn here, not $mysqli

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "ID: " . $row["pid"] . " - Name: " . $row["name"] . " color " . $row["color"] .  "<br>";
			echo '<img src="images/' . $row["photo1"] . '" alt="Phone Image"><br>'; 
        }
    } else {
        echo "No results found";
    }
} else {
    echo "Query failed: " . mysqli_error($conn); // Display the error message
}

mysqli_close($conn); // Close the database connection
?>


