<?php
/**
 * Created by PhpStorm.
 * User: ryanh
 * Date: 7/26/2018
 * Time: 8:28 PM
 */
include 'connection.php';
$username = $_POST["username"];
$pass = $_POST["pass"];
$sql = "select * from users where username='".$username."' and pass='".$pass."';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    session_start();
    $_SESSION["username"]="".$username."";
    header("Location:home.php");
} else {
    header("Location:loginfailed.html");
}

mysqli_close($conn);
?>