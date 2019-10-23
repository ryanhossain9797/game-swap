<?php
/**
 * Created by PhpStorm.
 * User: ryanh
 * Date: 7/27/2018
 * Time: 5:00 PM
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
                <li class="nav-item">
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
    $user = $_SESSION["username"];
    $sql = "select * from users where username='".$user."'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div id='post'>
                <h1>Username: " .$row["username"]."</h1><br><br>
                <br><h5>Email: " .$row["email"]."<br><br><hr>
                <h2>CHANGE PASSWORD</h2>
                <form method='post' action='changepass.php'>
                    <div class=\"form-group\">
                        <label for=\"newpass\">Enter New Password</label>
                        <input name='newpass' type=\"password\" class=\"form-control\" id=\"newpass\" aria-describedby=\"newpass\" placeholder=\"New Password\">
                    </div>
                    <div class=\"form-group\">
                        <label for=\"oldpass\">Your Current Password</label>
                        <input name='oldpass' type=\"password\" class=\"form-control\" id=\"oldpass\" placeholder=\"Old Password\">
                    </div>
                    <button type=\"submit\" class=\"btn btn-success\">Change Password</button>
                </form>
            </div>";
        }
    } else {
        echo "0 results";
    }
    mysqli_close($conn);
    ?>

</div>
<script type="text/javascript" src="js/home.js"></script>
</body>
</html>

