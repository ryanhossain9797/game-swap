<?php
/**
 * Created by PhpStorm.
 * User: ryanh
 * Date: 7/28/2018
 * Time: 7:19 PM
 */
session_start();
include 'connection.php';
if(!isset($_SESSION['username'])){
    header("Location:login.php");
}
$id=$_SESSION['username'];
$sql = "insert into messages (sender,receiver,msg) 
          values (\"".$_SESSION['username']."\",\"".$_POST['contact']."\",\"".$_POST["message"]."\")";
$result = mysqli_query($conn, $sql);
sleep(0.2);
header("Location:users.php");
?>