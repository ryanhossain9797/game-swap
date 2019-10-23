<?php
/**
 * Created by PhpStorm.
 * User: ryanh
 * Date: 7/28/2018
 * Time: 12:10 PM
 */
session_start();
include 'connection.php';
if(!isset($_SESSION['username'])){
    header("Location:login.php");
}
$sql = "delete from posts where id='".$_POST["postid"]."'";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
header("Location:myposts.php");
?>