<?php
/**
 * Created by PhpStorm.
 * User: ryanh
 * Date: 7/27/2018
 * Time: 4:24 PM
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
                <li class="nav-item active">
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
    <div id="post">
        <form action='poster.php' method='post'>
            <div class="form-group">
                <label for="cond">New or Used?</label>
                <select name="cond" class="form-control" id="cond">
                    <option>NEW</option>
                    <option>USED</option>
                </select>
            </div>
            <div class="form-group">
                <label for="platform">PS4 or XBOX?</label>
                <select name="platform" class="form-control" id="platform">
                    <option>PS4</option>
                    <option>XBOX</option>
                </select>
            </div>
            <div class="form-group">
                <label for="gamename">Which Game?</label>
                <select name="gamename" class="form-control" id="gamename">
                    <?php
                        $sql = "SELECT gamename FROM games order by gamename";
                        $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<option>".$row['gamename']."</option>";
                                }
                            }
                            else{
                                echo "No Games Available";
                            }
                            ?>
                </select>
            </div>
            <div class="form-group">
                <label for="sale_exchange">Your asking price?</label>
                <select name="sale_exchange" class="form-control" id="sale_exchange">
                    <option>Sale and Exchange</option>
                    <option>Sale Only</option>
                    <option>Exchange Only</option>
                </select>
            </div>
            <div class="form-group">
                <label for="price">Your asking price?</label>
                <input name="price" type="number" value="0" class="form-control" id="price" placeholder="Price">
            </div>
            <div class='form-group'>
                <label for='details'>Details</label>
                <textarea name='details' class='form-control' id='details' rows='3'></textarea>
            </div>
            <button class='btn btn-success' type='submit'>Add Post</button>
        </form>
    </div>
</div>
</body>
</html>