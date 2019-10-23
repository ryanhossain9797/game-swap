<?php
/**
 * Created by PhpStorm.
 * User: ryanh
 * Date: 7/27/2018
 * Time: 4:12 PM
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
                <li class="nav-item active">
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
    $sql = "SELECT * FROM posts where fromuser='".$_SESSION['username']."'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            if($row["fromuser"]!=$_SESSION["username"]){
                echo "<div id='post'>
                <form action='userinfo.php' method='post'>
                    <div class='form-group'>
                        <input type='hidden' class='form-control' name='username' id='gameid' value='".$row["fromuser"]."'>
                    </div>  
                    <button type='submit' class='btn btn-outline-light'>".$row["fromuser"]."</button>
                </form>";
            }
            else{
                echo "<div id='post'>
                <form action='myinfo.php' method='post'>
                    <div class='form-group'>
                        <input type='hidden' class='form-control'>
                    </div>  
                    <button type='submit' class='btn btn-outline-light'>".$row["fromuser"]."</button>
                </form>";
            }
            echo "<form action='gameinfo.php' method='post'>
                    <div class='form-group'>
                        <input type='hidden' class='form-control' name='gamename' id='gamename' value='".$row["forgame"]."'>
                    </div>  
                    <button type='submit' class='btn btn-outline-success btn-lg'>".$row["forgame"]."</button>
                </form>
                <h5>Price: " .$row["price"]." Tk</h5><br><h6>For ".$row["sale_exchange"]."<br><br>Condition: ".$row["cond"]."<br><br>Platform: "
                .$row["platform"]."</h6><br><h5>Details: " .$row["post"]."</h5><br>";
            if($row["fromuser"]==$_SESSION["username"])
                {echo "<form action='deletepost.php' method='post'>
                    <div class='form-group'>
                        <input type='hidden' class='form-control' name='postid' id='postid' value=".$row["id"].">
                    </div>  
                    <button type='submit' class='btn btn-danger'>Remove Post</button>
                    </form>";
                }
            $sql2 = "select * from offers where onpost='".$row['id']."'";
            $result2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result2) > 0) {
                // output data of each row
                echo "<div>";
                while($row2 = mysqli_fetch_assoc($result2)) {
                    if($row2["byuser"]!=$_SESSION["username"]){
                        echo "<hr>
                <form action='userinfo.php' method='post'>
                    <div class='form-group'>
                        <input type='hidden' class='form-control' name='username' id='gameid' value='".$row2["byuser"]."'>
                    </div>  
                    <button type='submit' class='btn btn-outline-light btn-lg'>".$row2["byuser"]."</button>
                </form>";
                    }
                    else{
                        echo "<hr>
                <form action='myinfo.php' method='post'>
                    <div class='form-group'>
                        <input type='hidden' class='form-control'>
                    </div>  
                    <button type='submit' class='btn btn-outline-light btn-lg'>".$row2["byuser"]."</button>
                </form>";
                    }
                    echo "<h5>Details: " .$row2["offer"]."</h5>
                <br><h4>Cash Offer: " .$row2["cash"]." Tk</h4>
            ";
                    if($row2["byuser"]==$_SESSION["username"]){
                        echo "<form action='deleteoffer.php' method='post'>
                    <div class='form-group'>
                        <input type='hidden' class='form-control' name='deleteoffer' id='deleteoffer' value=".$row2["id"].">
                    </div>  
                    <button type='submit' class='btn btn-outline-danger'>Delete Offer</button>
                </form>";
                    }
                }
                echo"</div>";
            } else {
                echo "0 comments";
            }
            echo "
                <hr>
                <form action='addcomment.php' method='post'>
                    <div class='form-group'>
                        <label for='offer'>Offer</label>
                        <textarea class='form-control' id='offer' name='newoffer' rows='3'></textarea>
                    </div>
                    <div class='form-group'>
                        <label for='cash'>Cash Offer</label>
                        <input type='number' value='0' class='form-control' id='cash' name='cash'>
                    </div>
                    <div class='form-group'>
                        <input type='hidden' class='form-control' name='postid' id='addcomment' value='".$row["id"]."'>
                    </div>
                    <button class='btn btn-success' type='submit'>Send Offer</button>
                </form>            
            ";
            echo "</div>";
        }
    } else {
        echo "0 results";
        echo "<div style='margin-bottom: 1000px'>   
            </div>";
    }

    mysqli_close($conn);
    ?>
</div>
<script type="text/javascript" src="js/home.js"></script>
</body>
</html>