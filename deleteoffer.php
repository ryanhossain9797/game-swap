<?php
/**
 * Created by PhpStorm.
 * User: ryanh
 * Date: 7/30/2018
 * Time: 1:33 PM
 */
session_start();
include 'connection.php';
if(!isset($_SESSION['username'])){
    header("Location:login.php");
}
$sql = "delete from offers where id='".$_POST["deleteoffer"]."' and byuser='".$_SESSION["username"]."'";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
header("Location:home.php");
?>