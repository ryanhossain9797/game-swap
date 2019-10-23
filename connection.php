<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "game_swap";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>