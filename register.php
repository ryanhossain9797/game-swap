<?php
/**
 * Created by PhpStorm.
 * User: ryanh
 * Date: 7/26/2018
 * Time: 7:46 PM
 */

session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register form</title>
    <link rel="stylesheet" href="css/register.css">
      <link rel="stylesheet" href="css/bootstrap.css">
      <link rel="stylesheet" href="css/all.min.css">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: black">
      <div class="container">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="home.php">Welcome to Game Swap</a>

          <div class="collapse navbar-collapse" id="navbarToggler">
              <ul class="navbar-nav ml-auto my-2 my-lg-0">
                  <li class="nav-item">
                      <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link active" href="signup.php"><i class="fas fa-user-plus"></i> Register</a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
    <div class="loginbox">
      <h1>Register</h1>
      <form class="loginform" action="registrar.php" method="post">
        <div class="inputBox">
          <input name="username" id="name" type="text" placeholder="Username" minlength="4" maxlength="15" required>
        </div>
        <div class="inputBox">
          <input name="email" id="email" type="email" placeholder="Email" required>
        </div>
        <div class="inputBox">
          <input name="pass" id="password" type="password" placeholder="Password" minlength="4" maxlength="15" required>
        </div>
          <button class="btn btn-success" type="submit" name="" value="Register">Register</button>
      </form>
    </div>
  </body>
</html>
