<?php
/**
 * Created by PhpStorm.
 * User: ryanh
 * Date: 7/26/2018
 * Time: 10:28 PM
 */
include 'connection.php';
$username = $_POST["username"];
$email = $_POST["email"];
$pass = $_POST["pass"];
$sql = "select * from users where username='".$username."' or email='".$email."';";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    header("Location:registrationfailed.html");
} else {
    $sql = "insert into users (username,email,pass) values('".$username."','".$email."','".$pass."')";
    mysqli_query($conn,$sql);
    session_start();
    $_SESSION["username"]="".$username."";
    header("Location:home.php");
}

mysqli_close($conn);

?>