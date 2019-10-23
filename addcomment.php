<?php
/**
 * Created by PhpStorm.
 * User: ryanh
 * Date: 7/27/2018
 * Time: 7:02 PM
 */
session_start();
include 'connection.php';
if(!isset($_SESSION['username'])){
    header("Location:login.php");
}
$id=$_SESSION['username'];
$sql = "insert into offers (byuser,onpost,offer,cash) values ('".$id."',".$_POST['postid'] .",\"".$_POST['newoffer']."\"
            ,'".$_POST["cash"]."')";
$result = mysqli_query($conn, $sql);
sleep(0.2);
header("Location:home.php");
?>