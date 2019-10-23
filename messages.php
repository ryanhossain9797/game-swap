<?php
/**
 * Created by PhpStorm.
 * User: ryanh
 * Date: 7/30/2018
 * Time: 7:01 PM
 */
session_start();
include 'connection.php';
if(!isset($_SESSION['username'])){
    header("Location:login.php");
}
?>
<html id="html">
<head>
    <title>Game Swap</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/post.css">
    <link rel="stylesheet" href="css/all.min.css">
</head>
<body id="body">
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: black">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="home.php"><i class="fas fa-gamepad"></i> Game Swap</a>

        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="myposts.php">My Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="newpost.php">New Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="users.php">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="games.php">All Games</a>
                </li>
                <li class="nav-item active">
                    <?php
                    echo "<a class=\"nav-link\" href=\"messages.php\">Inbox(";
                    $sqlunread = "SELECT * FROM messages where  receiver =\"".$_SESSION["username"]."\" and msgread = 'no' order by time desc";
                    $unread = mysqli_query($conn, $sqlunread);
                    echo    mysqli_num_rows($unread);
                    echo ")</a>";
                    ?>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="myinfo.php"><?php
                        echo "<i class=\"fas fa-user\"></i>  " .$_SESSION['username'].""
                        ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Log Out <i class="fas fa-sign-out-alt"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container" id="posts">
    <?php
    $sql = "SELECT * FROM messages where  receiver =\"".$_SESSION["username"]."\" and msgread = 'no' order by time desc";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        echo "<div id='post'><h2>Unread Messages</h2>";
        while($row = mysqli_fetch_assoc($result)) {
            echo "<hr><h4>" . $row["sender"]. "</h4><br>
            <h6>" . $row["msg"]. "</h6>";
            echo "<form action='message.php' method='post'>
                    <div class='form-group'>
                        <input type='hidden' class='form-control' name='contact' id='contact' value='".$row["sender"]."'>
                    </div>  
                    <button type='submit' class='btn btn-success'>Reply</button>
                </form>";
        }
        echo "</div>";
    } else {
        echo "0 results";
    }

    mysqli_close($conn);
    ?>

    <div style='margin-bottom: 400px'>
    </div>
</div>
<script type="text/javascript" src="js/home.js"></script>
</body>
</html>