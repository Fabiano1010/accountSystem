<?php
// error_reporting(0);
session_start();

// już zalogowany
if(isset($_SESSION['loggedIN'])){
  header("Location: user.php");
exit();
}


$con = mysqli_connect("localhost", "root", "", "users") or die("Connection error");
mysqli_set_charset($con, "utf8");




if(isset($_POST['login'])){
  $login = $con->real_escape_string($_POST['user']);
  $pass = md5($con->real_escape_string($_POST['password']));

$sql = "SELECT * FROM users WHERE user='".$login."' AND pass='".$pass."';";
$data = $con->query($sql);


  if($data->num_rows > 0){ // logowanie
    
    $_SESSION['loggedIN'] = '1'; 
    $_SESSION['user_session'] = $login; 
    $_SESSION['database'] = strtolower($login)."_db";
   

    exit('Logged in successfully'); 
    header("Location: user.php");
    
  }
  else
  {
    
    exit('Worng login or password');
    
  }


}



mysqli_close($con);

?>

