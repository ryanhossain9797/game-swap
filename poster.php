<?php
/**
 * Created by PhpStorm.
 * User: ryanh
 * Date: 7/27/2018
 * Time: 8:15 PM
 */
session_start();
include 'connection.php';
if(!isset($_SESSION['username'])){
    header("Location:login.php");
}
$id=$_SESSION['username'];
$sql = "insert into posts (forgame,fromuser,post,price,platform,cond,sale_exchange) 
          values (\"".$_POST['gamename']."\",'".$id."',\"".$_POST['details']."\",".
                    $_POST['price'].",'".$_POST['platform']."','".$_POST['cond']."','".$_POST["sale_exchange"].
            "')";
$result = mysqli_query($conn, $sql);
sleep(0.2);
header("Location:myposts.php");
?>