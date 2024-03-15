
<?php 
    session_start();
    echo $_SESSION['database'];
    if(!isset($_SESSION['user_session'])){
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="logo.png">
    <title>User panel</title>
</head>
<body>
    
<?php
    if(isset($_SESSION['user_session'])){
        echo '<div class="box"><form action="logout.php" method="POST">
        <button type="submit" class="btn" class="logout"><span class="s1"></span>
        <span class="s2"></span>
        <span class="s3"></span>
        <span class="s4"></span>
        Log out
        </button>
            </form></div>';
    }


?>
    <div class="container">
        <?php
            if(isset($_SESSION['user_session'])){
                echo  '<h1 class="capitalize" style="margin-top: 20px;">Hello ' . $_SESSION["user_session"] . '!</h1>';
            }
        ?>


        <div id="user">
            
      </div>
      <!-- uploading files
            <div class='form-log marg' id='login' > 
        <form action='user.php' method='POST' enctype="multipart/form-data">
            <div class='data-box'>
            <input type='file' name='img' required id='img' class='input' accept='.png,.gif,.jpg'>
            </div>
            <div class='data-box'>
            <input type='text' name='catname' required id='img' class='input' accept='.png,.gif,.jpg'>
            </div>
            <div class='error' id='error'>
            </div>
            <center>
            <button type='submit' class='btn marg' id='btn'>
            <span class='s1'></span>
            <span class='s2'></span>
            <span class='s3'></span>
            <span class='s4'></span>
            Upload
            </button>
            </center>
        </form>
        </div> -->
    </div>

    <footer class="footer">Fabian Skrzypczyński 2022 &copy;</footer>
<?php

//  UPLOADING FILES
// $con = mysqli_connect("localhost", "root", "", "users") or die("Connection error");
// mysqli_set_charset($con, "utf8");

// if(isset($_FILES['img'])){
//        // var_dump($_FILES);
//         //print_r($_FILES);
//         $img_name = $_FILES['img']['catname'];
//         $img_data = file_get_contents($_FILES['img']['tmp_name']);
//         $catname = $_POST['catname'];
//        // print_r($img_name);
//         //print_r($img_data);
//         //print_r($imie);
//         $sql = "INSERT INTO user_db(img_name, img_data, name) VALUES ('$img_name', '"
//          . mysqli_escape_string($con, $img_data) . "' ,'$catname');";
        
//         $query = mysqli_query($con, $sql) or die("Query error");  
        
//         exit("File uploaded");
//         header("Location:user.php");


// }
// mysqli_close($con);
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){

    $.ajax({
        url: 'fetch.php',
        method: "POST",
        success: function(response){
            $('#user').html(response);
            
        },

    })

    
});
</script>
</body>
</html>