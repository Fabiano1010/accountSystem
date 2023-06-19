<!-- php -->
<?php 
session_start();
if(isset($_SESSION['user_session'])){
  header('Location: user.php');
}
// error_reporting(0); 
?>
<!-- treść -->
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="icon" href="logo.png">
  <title>Login</title>
</head>
<body>
  <div class="container">

    <div class="switch">
      <span class="s5"></span>
      <span class="s7"></span>
      <input type="checkbox" class="switch-button" id="check" name="checkbox">
      <label class="switch-button-label">
        <span class="switch-button-label-span">
          Log in
        </span>
      </label>
      <span class="s6"></span>
      <span class="s8"></span>
    </div>

    <div class="form-log" id="login">
      <form action="login.php" method="POST">
        <div class="data-box">
          <input type="text" name="login" required="" id="user" class="input">
          <label>Login</label>
        </div>
        <div class="data-box">
          <input type="password" name="pass" required="" id="pass" class="input">
          <label>Password</label>
        </div>
        <div class="error" id="error">
          <?php

          ?>
        </div>
        <center>
        <button type="button" class="btn marg" id="btn-log">
          <span class="s1"></span>
          <span class="s2"></span>
          <span class="s3"></span>
          <span class="s4"></span>
          log in
        </button>
        </center>
      </form>
    </div>

    <div class="form-reg" id="reg">
      <form action="register.php" method="POST">
        <div class="data-box">
          <input type="text" name="firstname" required="" max="20" class="capitalize">
          <label>Name</label>
        </div>
        <div class="data-box">
          <input type="text" name="surname" required="" max="40" class="capitalize">
          <label>Last name</label>
        </div>
        <div class="data-box">
          <input type="email" name="email" required="" max="20">
          <label>Email</label>
        </div>
        <div class="data-box">
          <input type="text" name="login1" required="" max="20">
          <label>Login</label>
        </div>
        <div class="data-box">
          <input type="password" name="pass1" required="" min="3" max="25">
          <label>Password</label>
        </div>
      <center>
        <button type="submit" class="btn marg" id="btn-reg">
          <span class="s1"></span>
          <span class="s2"></span>
          <span class="s3"></span>
          <span class="s4"></span>
          sign up
        </button>
      </center>
      </form>
    </div>
  </div>
  
  
  <center>
    <div>
      <?php
      if (isset($_GET['success'])&& !isset($_GET['failure'])){
        echo "<div class='o' id='o'><div class='r'></div></div>";
      }


      elseif (isset($_GET['failure'])&&!isset($_GET['success'])){
        echo "<div class='x' id='x'></div>";
      }
      ?>
    </div>
  </center>

    <footer class="footer">Fabian Skrzypczyński 2022 &copy;</footer>

<!-- skripts -->
  <script src="switch.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      console.log("Ready");

      $("#btn-log").on('click', function() {
        var user = $("#user").val();
        var pass = $("#pass").val();

        if (user == "" || pass == "" || user.indexOf(' ') >= 0 || pass.indexOf(' ') >= 0) {
          alert("Check your inputs");
        } else {
          $.ajax({
            url: 'login.php',
            method: 'POST',
            data: {
              login: 1,
              user: user,
              password: pass
            },
            success: function(response) {

              if (response.indexOf('Logged in successfully') >= 0){
               window.location='user.php'; 

              }
              $("#error").html(response);
              $(".input").css({'border-color': 'rgb(200, 0, 0)'});
            },
            dataType: 'text'
          })
        }
      })
    })
  </script>
</body>
</html>